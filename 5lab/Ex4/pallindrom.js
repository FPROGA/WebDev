        function check(word)
        {
              // Удаляем пробелы и приводим к нижнему регистру
                 var cleanedWord = word.replace(/s+/g, '').toLowerCase();
                 // Переворачиваем строку
                 var reversedWord = cleanedWord.split('').reverse().join('');

                 if (cleanedWord === reversedWord) {
                     return "верно";
                 } else {
                     return "неверно";
                 }
        }


        function checkPal()
        {
            var text1 = document.getElementById('word').value; // Получаем значение из текстового поля
            var result = check(text1);
            document.getElementById('result').textContent = "Результат: " + result;


        }

