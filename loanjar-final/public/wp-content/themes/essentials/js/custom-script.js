$(function() {

    var $document = $(document);
    var selector = '[data-rangeslider]';
    var $element = $(selector);

    // For ie8 support
    var textContent = ('textContent' in document) ? 'textContent' : 'innerText';

    // Example functionality to demonstrate a value feedback
    function valueOutput(element) {
        var value = element.value;
        var output = element.parentNode.getElementsByTagName('output')[0] || element.parentNode.parentNode.getElementsByTagName('output')[0];
        output[textContent] = '£'+value;
    }

    function hideShowTerm(value) {
        if(value>2000){
            var show = ["12", "18", "24", "36"];
        }
        else if(value>1000) {
            var show = ["6", "12", "18", "24", "36"];
        }
        else if(value>900) {
            var show = ["3", "6", "12", "18", "24", "36"];
        }
        else if(value>0) {
            var show = ["3", "6", "12"];
        }
        $(".range-value li").each(function(){
            var dataValue = $(this).attr("data-value");
            $(this).removeClass("show hide");
            if(jQuery.inArray(dataValue, show) !== -1){
                $(this).addClass("show");
            }
            else {
                if($(this).hasClass("active")) {
                    $(".range-value li").removeClass("active");
                    $(this).parent().find('li.show:first').addClass("active");
                }
                $(this).addClass("hide");
            }
        });
    }

    $document.on('input', 'input[type="range"], ' + selector, function(e) {
        valueOutput(e.target);
    });

    // Basic range-slider initialization
    $element.rangeslider({

        // Deactivate the feature detection
        polyfill: false,

        // Callback function
        onInit: function() {
            $(".range-block output").css("left",this.position);
            valueOutput(this.$element[0]);
            hideShowTerm(this.$element[0].value);
        },
        // Callback function
        onSlide: function(position, value) {
            // console.log('position: ' + position, 'value: ' + value);
            $(".range-block output").css("left",position);
            hideShowTerm(value);
        }

    });
    $(".range-value li").click(function(){
        $(".range-value li").removeClass("active");
        $(this).addClass("active");
    });

    $(".range-mobile select").change(function(){
        var v = $(this).val();
        hideShowTerm(v);
    });
});
