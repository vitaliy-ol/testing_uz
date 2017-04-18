var btn_finish_test = document.querySelector('.completion_test');
    btn_finish_test.addEventListener('click', fixedResult);
    
    function fixedResult() {
//        здесь вызывай функцию которая управляет кнопкой
//        можно так btn(this); btn-название функции, this-сама кнопка
        var request = new XMLHttpRequest(),
        flag = 'flag=getMeInfo';
        
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var info = JSON.parse(request.responseText);
                    getAnswer(info);
            }
        }

        request.open('POST', '../php/info.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(flag);
    };

    function getAnswer(info) {
        var checkbox = document.querySelectorAll('input[type=radio]:checked'),
            general_obj = {
                id_user : info.id_user,
                title_test : info.title_test,
                res : []
            },
            i = 1;

        checkbox.forEach(function(item) {
            general_obj.res.push({id_quest: item.getAttribute('data-questid'), id_answer: item.value});
            i++;
        });
        sendResult(JSON.stringify(general_obj));
    };

    function sendResult(obj) {
        var request = new XMLHttpRequest(),
            data = 'res='+obj;
        
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                document.querySelector('.correct-ansver').innerHTML = request.responseText;
                document.querySelector('.completion_test').style['display'] = 'none';
                document.querySelector('.timer').style['display'] = 'none';
                document.querySelector('.test').style['display'] = 'none';
                document.querySelector('.result').style['display'] = 'block';
//                circle
                var pie1 = $('.progress-test'),
                    res = Number($('.correct-ansver').text()) * 100 / Number($('.correct-ansver').attr('data-col'));
                progressBarUpdate(Math.round(res), 100, pie1);
            }
        }

        request.open('POST', '../php/fixResult.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(data);
    }