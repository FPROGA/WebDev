
        function sum(x)
        {
            var result = 0;

            for (var i = 0; i < x.length; i++) {
                // Преобразуем строку в число
                var number = parseFloat(x[i]);
                var normalizedAngle = number % 360;
                // Проверяем, является ли косинус отрицательным
                if (normalizedAngle  < 270 && normalizedAngle  > 90) {
                    result += number; // Суммируем элементы, у которых косинус отрицательный
                }
            }

            return result;
        }
        function deleteNumbers(x)
        {
           var result2 = 0;
                    for (var i = 0; i < x.length; i++) {
                        // Преобразуем строку в число
                        var number = parseFloat(x[i]);


                        if (Math.abs(number) > 0) {
                         var text = number.toString().split('');
                         var sumOfTexts = text.reduce((sum, digit) => sum + parseInt(digit), 0);
                            if (sumOfTexts % 2 == 0) {
                                result2 += number;
                            }
                        }
                    }
           return result2;
        }

        function calculateSum()
        {
            var text1 = document.getElementById('arrayInput').value; // Получаем значение из текстового поля
            var massive = text1.split(",").map(item => item.trim()); // Разделяем по запятой и убираем пробелы
            var result = sum(massive);
            document.getElementById('result').textContent = "Результат: " + result;


        }
         function deleteEl()
         {
            var text1 = document.getElementById('arrayInput').value; // Получаем значение из текстового поля
            var massive = text1.split(",").map(item => item.trim());
            var result2 = deleteNumbers(massive);
            document.getElementById('result2').textContent = "Результат: " + result2;
         }
