
        document.addEventListener("DOMContentLoaded", function () {
            var chua = document.getElementsByClassName('none');
            var tich = document.getElementsByTagName('input');

            // cau1
            tich[0].onclick = function () {
                chua[0].classList.add('right');
                chua[1].classList.remove('wrong');
                chua[2].classList.remove('wrong');
            }
            tich[1].onclick = function () {
                chua[1].classList.add('wrong');
                chua[0].classList.remove('right');
                chua[2].classList.remove('wrong');
            }
            tich[2].onclick = function () {
                chua[2].classList.add('wrong');
                chua[1].classList.remove('wrong');
                chua[0].classList.remove('right');
            }

            // cau2
            tich[3].onclick = function () {
                chua[3].classList.toggle('right');
            }
            tich[4].onclick = function () {
                chua[4].classList.toggle('right');
            }
            tich[5].onclick = function () {
                chua[5].classList.toggle('wrong');
            }
            tich[6].onclick = function () {
                chua[6].classList.toggle('wrong');
            }

            // cau3
            tich[7].onclick = function () {
                chua[7].classList.add('right');
                chua[8].classList.remove('wrong');
            }
            tich[8].onclick = function () {
                chua[8].classList.add('wrong');
                chua[7].classList.remove('right');
            }
        }, false)
