;
(function () {

    var inp = document.querySelectorAll('.ansver');

    inp.forEach(function (item) {
        item.addEventListener('click', greenBtn);
    });

    function greenBtn() {
        var parent_data = this.parentElement.getAttribute('data-label');
        document.querySelector('label[data-for=' + parent_data + ']').classList.add('green_btn');
    }
}());

;
(function () {
    var parentLabel = document.querySelector('.choice_tests'),
        allLabels = parentLabel.querySelectorAll('label');

    allLabels.forEach(function (item) {
        item.addEventListener('click', toggleLabels);
    });

    function toggleLabels() {
        var labelAttr = this.getAttribute('data-section'),
            allSection = document.querySelectorAll('.question');

        allLabels.forEach(function (item) {
            item.classList.remove('active-btn');
        });
        this.classList.add('active-btn');

        allSection.forEach(function (item) {
            if (item.classList.contains('question-' + labelAttr)) {
                item.style['display'] = 'block';
            } else {
                item.style['display'] = 'none';
            }
        });

    };
}());

;
(function () {
    $(document).ready(function () {
        var pie1 = $('.progress-test');
        progressBarUpdate(30, 100, pie1);
    });

    function rotate(element, degree) {
        element.css({
            '-webkit-transform': 'rotate(' + degree + 'deg)',
            '-moz-transform': 'rotate(' + degree + 'deg)',
            '-ms-transform': 'rotate(' + degree + 'deg)',
            '-o-transform': 'rotate(' + degree + 'deg)',
            'transform': 'rotate(' + degree + 'deg)',
            'zoom': 1
        });
    }

    function progressBarUpdate(x, outOf, elem) {
        var firstHalfAngle = 180;
        var secondHalfAngle = 0;

        // caluclate the angle
        var drawAngle = x / outOf * 360;

        // calculate the angle to be displayed if each half
        if (drawAngle <= 180) {
            firstHalfAngle = drawAngle;
        } else {
            secondHalfAngle = drawAngle - 180;
        }

        // set the transition
        rotate(elem.find(".slice1"), firstHalfAngle);
        rotate(elem.find(".slice2"), secondHalfAngle);

        // set the values on the text
        elem.find(".status").html(x + "<span>%</span>");
    }
}());
