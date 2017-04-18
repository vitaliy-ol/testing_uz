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