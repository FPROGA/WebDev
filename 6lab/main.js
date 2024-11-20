 function showAlert(event) {
            event.preventDefault();


            const name = document.getElementById('name').value.trim();
            const secondName = document.getElementById('secondName').value.trim();
            const year = document.getElementById('year').value;
            const phrase = document.getElementById('phrase').value.trim();
            const hobbi = document.getElementById('hobbi').value.trim();
            const profession = document.getElementById('profession').value.trim();
            const contact = document.getElementById('contact').value.trim();
            const email = document.getElementById('email').value.trim();


            if (!name || !secondName || !year || !profession || !contact || !email) {
                alert("Пожалуйста, заполните все обязательные поля.");
                return;
            }

            if (year < 1900 || year > 2008) {
                alert("Введите корректный год рождения.");
                return;
            }

            const phoneRegex = /^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/;
            if (!phoneRegex.test(contact)) {
                alert("Введите корректный номер телефона в формате: +7 (___) ___-__-__");
                return;
            }
             if (!emailRegex.test(email)) {
               alert("Введите корректный адрес электронной почты.");
               return;
             }


             const output = `
             Имя: ${name}
             Фамилия: ${secondName}
             Год рождения: ${year}
             Цитата: ${phrase}
             Хобби: ${hobbi}
             Профессия: ${profession}
             Номер телефона: ${contact}
             Электронная почта: ${email}
                        `;
             alert("Вы зарегистрированы успешно\n\n" + output);

             // Сброс формы
              document.querySelector('.registration').reset();
             }

