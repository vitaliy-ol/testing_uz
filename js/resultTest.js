var btn_finish_test = document.querySelector('.completion_test');
    btn_finish_test.addEventListener('click', fixedResult);
    
    function fixedResult() {
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
                console.log(request.responseText);
            }
        }

        request.open('POST', '../php/fixResult.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.send(data);
    }