

const ease = {
    exponentialIn: (t) => {
        return t == 0.0 ? t : Math.pow(2.0, 10.0 * (t - 1.0));
    },
    exponentialOut: (t) => {
        return t == 1.0 ? t : 1.0 - Math.pow(2.0, -10.0 * t);
    },
    exponentialInOut: (t) => {
        return t == 0.0 || t == 1.0
        ? t
        : t < 0.5
        ? +0.5 * Math.pow(2.0, (20.0 * t) - 10.0)
        : -0.5 * Math.pow(2.0, 10.0 - (t * 20.0)) + 1.0;
    },
    sineOut: (t) => {
        const HALF_PI = 1.5707963267948966;
        return Math.sin(t * HALF_PI);
    },
    circularInOut: (t) => {
        return t < 0.5
        ? 0.5 * (1.0 - Math.sqrt(1.0 - 4.0 * t * t))
        : 0.5 * (Math.sqrt((3.0 - 2.0 * t) * (2.0 * t - 1.0)) + 1.0);
    },
    cubicIn: (t) => {
        return t * t * t;
    },
    cubicOut: (t) => {
        const f = t - 1.0;
        return f * f * f + 1.0;
    },
    cubicInOut: (t) => {
        return t < 0.5
        ? 4.0 * t * t * t
        : 0.5 * Math.pow(2.0 * t - 2.0, 3.0) + 1.0;
    },
    quadraticOut: (t) => {
        return -t * (t - 2.0);
    },
    quarticOut: (t) => {
        return Math.pow(t - 1.0, 3.0) * (1.0 - t) + 1.0;
    },
}



class ShapeOverlays {
    constructor(elm) {
        if(!elm)return;
        this.elm = elm;
        this.path = elm.querySelectorAll('path');
        this.numPoints = 10;
        this.duration = 700;
        this.delayPointsArray = [];
        this.delayPointsMax = 300;
        this.delayPerPath = 250;
        this.timeStart = Date.now();
        this.isOpened = false;
        this.isAnimating = false;
        this.type = "pix-overlay-6";
        // if($('body').attr('pix-overlay')){
        // if(document.getElementsByTagName('body')[0].getAttribute('data-pix-overlay')){
        //     this.type = document.getElementsByTagName('body')[0].getAttribute('data-pix-overlay');
        // }
        if(pixfort_main_object != 'undefined' || pixfort_main_object != undefined){
            if(pixfort_main_object.hasOwnProperty('dataPixOverlay')){
                this.type = pixfort_main_object.dataPixOverlay;
            }
        }


        if(this.type == "pix-overlay-1"){
            this.numPoints = 18;
            this.duration = 500;
            this.delayPointsMax = 300;
            this.delayPerPath = 100;
        }
        if(this.type == "pix-overlay-2"){
            this.numPoints = 4;
            this.duration = 600;
            this.delayPointsMax = 180;
            this.delayPerPath = 70;
        }
        if(this.type == "pix-overlay-3"){
            this.numPoints = 2;
            this.duration = 500;
            this.delayPointsMax = 0;
            this.delayPerPath = 200;
        }
        if(this.type == "pix-overlay-4"){
            this.numPoints = 4;
            this.duration = 900;
            this.delayPointsMax = 0;
            this.delayPerPath = 60;
        }
        if(this.type == "pix-overlay-5"){
            this.numPoints = 85;
            this.duration = 400;
            this.delayPointsMax = 300;
            this.delayPerPath = 150;
        }
    }
    toggle() {
        this.isAnimating = true;

        if(this.type == "pix-overlay-1"){
            const range = 4 * Math.random() + 6;
            for (var i = 0; i < this.numPoints; i++) {
                const radian = i / (this.numPoints - 1) * Math.PI;
                this.delayPointsArray[i] = (Math.sin(-radian) + Math.sin(-radian * range) + 2) / 4 * this.delayPointsMax;
            }

        }

        if(this.type == "pix-overlay-2"){
            const range = Math.random() * Math.PI * 2;
            for (var i = 0; i < this.numPoints; i++) {
                const radian = (i / (this.numPoints - 1)) * Math.PI * 2;
                this.delayPointsArray[i] = (Math.sin(radian + range) + 1) / 2 * this.delayPointsMax;
            }
        }

        if(this.type == "pix-overlay-3" || this.type == "pix-overlay-4"){
            for (var i = 0; i < this.numPoints; i++) {
                this.delayPointsArray[i] = 0;
            }
        }

        if(this.type == "pix-overlay-5" || this.type == "pix-overlay-6"){
            for (var i = 0; i < this.numPoints; i++) {
                this.delayPointsArray[i] = Math.random() * this.delayPointsMax;
            }
        }


        if (this.isOpened === false) {
            this.open();
        } else {
            this.close();
        }
    }
    open() {
        this.isOpened = true;
        this.elm.classList.add('is-opened');
        this.timeStart = Date.now();
        this.renderLoop();
    }
    close() {
        this.isOpened = false;
        this.elm.classList.remove('is-opened');
        this.timeStart = Date.now();
        this.renderLoop();
    }
    updatePath(time) {
        const points = [];
        let str = '';

        if(this.type == "pix-overlay-1" || this.type == "pix-overlay-2"){
            for (var i = 0; i < this.numPoints + 1; i++) {
                points[i] = ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1)) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]} ` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 0 H 0` : `V 100 H 0`;
        }

        if(this.type == "pix-overlay-3"){
            for (var i = 0; i < this.numPoints; i++) {
                const thisEase = this.isOpened ?
                (i == 1) ? ease.cubicOut : ease.cubicInOut:
                (i == 1) ? ease.cubicInOut : ease.cubicOut;
                points[i] = thisEase(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1)) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]} ` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 0 H 0` : `V 100 H 0`;
        }

        if(this.type == "pix-overlay-4"){
            for (var i = 0; i < this.numPoints; i++) {
                const thisEase = (i % 2 === 1) ? ease.sineOut : ease.exponentialInOut;
                points[i] = (1 - thisEase(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 H ${points[0]}` : `M ${points[0]} 0`;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${points[i]} ${cp} ${points[i + 1]} ${cp} ${points[i + 1]} ${p} `;
            }
            str += (this.isOpened) ? `H 100 V 0` : `H 0 V 0`;
        }

        if(this.type == "pix-overlay-5"){
            for (var i = 0; i < this.numPoints; i++) {
                points[i] = (1 - ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 H ${points[0]}` : `M ${points[0]} 0`;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${points[i]} ${cp} ${points[i + 1]} ${cp} ${points[i + 1]} ${p} `;
            }
            str += (this.isOpened) ? `H 100 V 0` : `H 0 V 0`;
        }

        if(this.type == "pix-overlay-6"){
            for (var i = 0; i < this.numPoints; i++) {
                points[i] = (1 - ease.cubicInOut(Math.min(Math.max(time - this.delayPointsArray[i], 0) / this.duration, 1))) * 100
            }

            str += (this.isOpened) ? `M 0 0 V ${points[0]}` : `M 0 ${points[0]} `;
            for (var i = 0; i < this.numPoints - 1; i++) {
                const p = (i + 1) / (this.numPoints - 1) * 100;
                const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
                str += `C ${cp} ${points[i]} ${cp} ${points[i + 1]} ${p} ${points[i + 1]} `;
            }
            str += (this.isOpened) ? `V 100 H 0` : `V 0 H 0`;
        }
        return str;


    }
    render() {
        if (this.isOpened) {
            for (var i = 0; i < this.path.length; i++) {
                this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * i)));
            }
        } else {
            for (var i = 0; i < this.path.length; i++) {
                this.path[i].setAttribute('d', this.updatePath(Date.now() - (this.timeStart + this.delayPerPath * (this.path.length - i - 1))));
            }
        }
    }
    renderLoop() {
        this.render();
        if (Date.now() - this.timeStart < this.duration + this.delayPerPath * (this.path.length - 1) + this.delayPointsMax) {
            requestAnimationFrame(() => {
                this.renderLoop();
            });
        }
        else {
            this.isAnimating = false;
        }
    }
}







class dividerShapes {
  constructor(elm) {
    this.elm = elm;
    this.path = elm.querySelectorAll('path');
    this.numPoints = 3;
    this.speed = 0.4;
    this.paths = [];
    this.pointsDir = [];
    this.pathsDir = [];
    this.min = 20;
    this.max = 80;
  }
  initPoints() {
      for (var i = 0; i < this.path.length; i++) {
          let points = [];
          let pointsDir = [];
          var rand = this.getRndInteger(this.min+1, this.max-1);
          const range = Math.random() * Math.PI * 2;
          for (var j = 0; j < this.numPoints; j++) {
            pointsDir[j] = this.getRndInteger(0, 1);

            const radian = (j / (this.numPoints - 1)) * Math.PI * 2;
            points[j] = ((Math.sin(radian + range) + 1) / 2)*100 ;

          }
          this.paths[i] = points;
          this.pathsDir[i] = pointsDir;
      }
      for (var j = 0; j < this.path.length; j++) {
          let str = '';
          str +=  `M 0 ${this.paths[j][0]} `;
          for (var i = 0; i < this.numPoints - 1; i++) {
            const p = (i + 1) / (this.numPoints - 1) * 100;
            const cp = p - (1 / (this.numPoints - 1) * 100) / 2;
            str += `C ${cp} ${this.paths[j][i]} ${cp} ${this.paths[j][i + 1]} ${p} ${this.paths[j][i + 1]} `;
          }
          str += `V 100 H 0`;
          this.path[j].setAttribute('d', str);
      }
      // if(window.innerWidth>600){
          this.loop();
      // }
  }
  loop(){
      var self = this;
      setTimeout(function () {
          if(window.isInViewport(self.elm)){
              for (var j = 0; j < self.path.length; j++) {
                  for (var i = 0; i < self.numPoints; i++) {
                      var teta = self.getRndInteger(0, 40)/100; ;
                      if(self.pathsDir[j][i]>0){
                          self.paths[j][i]+= Math.abs(Math.sin( ((self.paths[j][i]-self.min)/(self.max-self.min))*Math.PI ))*self.speed+teta;
                          if(self.paths[j][i]>=(j==0 ? self.max-10 : self.max) ){
                              self.pathsDir[j][i]=0;
                          }
                      }else{
                          self.paths[j][i]-= Math.abs(Math.sin( ((self.max-self.paths[j][i]-self.min)/(self.max-self.min))*Math.PI ))*self.speed+teta;
                          if(self.paths[j][i]<=self.min){
                              self.pathsDir[j][i]=1;
                          }
                      }
                  }
                  let str = '';
                  str +=  `M 0 ${self.paths[j][0]} `;
                  for (var i = 0; i < self.numPoints - 1; i++) {
                    const p = (i + 1) / (self.numPoints - 1) * 100;
                    const cp = p - (1 / (self.numPoints - 1) * 100) / 2;
                    str += ' ';
                    // str += `C ${cp} ${self.paths[j][i]} ${cp} ${self.paths[j][i + 1]} ${p} ${self.paths[j][i + 1]} `;
                    str += 'C '+cp+' '+self.paths[j][i]+' '+cp+' '+self.paths[j][i + 1]+' '+p+' '+self.paths[j][i + 1]+' ';
                  }
                  str += 'V 100 H 0';
                  self.path[j].setAttribute('d', str);
                  // self.path[j].setAttribute('d', str);
              }
          }

        self.loop();
    }, 40);
  }
  getRndInteger(min, max) {
      return Math.floor(Math.random() * (max - min) ) + min;
  }
}
