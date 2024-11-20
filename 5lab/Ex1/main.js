function getMushroomWord(count) {
    if (count % 10 === 1 && count % 100 !== 11) {
        return "гриб";
    } else if (count % 10 >= 2 && count % 10 <= 4 && (count % 100 < 12 || count % 100 > 14)) {
        return "гриба";
    } else {
        return "грибов";
    }
}

document.getElementById('submitButton').addEventListener('click', function() {
    const count = parseInt(document.getElementById('mushroomCount').value); //получение количества
    if (!isNaN(count) && count >= 0) {
        const mushroomWord = getMushroomWord(count); // получение слова полученного из функции
        document.getElementById('result').textContent = `${count} ${mushroomWord}`;
    } else {
        document.getElementById('result').textContent = "Пожалуйста, введите корректное число.";
    }
});
