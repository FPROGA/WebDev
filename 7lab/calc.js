

     function addToDisplay(value) {
         const display = document.getElementById('display');
         display.value += value; // добавляем значение к текущему содержимому
     }

     function clearDisplay() {
         const display = document.getElementById('display');
         display.value = ''; // очищаем поле
     }

     function calculateInverse() {
            const display = document.getElementById('display');
            const currentValue = parseFloat(display.value);
            if (currentValue == 0) {
                alert("Деление на ноль невозможно");
                return;
            }
            display.value = (1 / currentValue).toString();
     }
      function calculateProcent(){
       const display = document.getElementById('display');
       const currentValue = parseFloat(display.value);
       display.value = (currentValue/100).toString();
      }
      function secret(){
       display.value = ("Поставьте 5 пж");

      }

       function getKor(){
       const display = document.getElementById('display');
       const currentValue = parseFloat(display.value);
       if (currentValue < 0) {
          alert("Невозможно извлечь корень из отрицательного числа");
          return;
       }
        display.value = (Math.sqrt(currentValue)).toString();
       }
     function calculateResult() {
         const display = document.getElementById('display');
         try {
              const expression = display.value.replace(/:/g, '/');
              const result = eval(expression);
             if (result == Infinity || result == -Infinity)
             {
                alert("Деление на ноль невозможно");
                clearDisplay();
                return;
             }
               if (isNaN(result)) {
               alert("Ошибка в выражении");
               clearDisplay();
               return;
               }
               display.value = result;
         } catch (error) {
             alert("Ошибка в выражении");
             clearDisplay();
         }
     }
