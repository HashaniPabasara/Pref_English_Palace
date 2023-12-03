function submitQuiz() {
    const answers = {
        q1: document.querySelector('input[name="q1"]:checked'),
        q2: document.querySelector('input[name="q2"]:checked'),
        q3: document.querySelector('input[name="q3"]:checked'),
        q4: document.querySelector('input[name="q4"]:checked'),
        q5: document.querySelector('input[name="q5"]:checked'),
        q6: document.querySelector('input[name="q6"]:checked'),
        q7: document.querySelector('input[name="q7"]:checked'),
        q8: document.querySelector('input[name="q8"]:checked'),
        q9: document.querySelector('input[name="q9"]:checked'),
        q10: document.querySelector('input[name="q10"]:checked'),
    };

    // Validate that each question has an answer
    for (const question in answers) {
        if (!answers[question] || !answers[question].value) {
            alert('Please answer all questions!');
            return;
        }
    }

    const correctAnswers = {
        q1: 'goes',
        q2: 'adjective',
        q3: 'are playing',
        q4: 'will cook',
        q5: 'adverb',
        q6: 'approved',
        q7: 'Nirmal',
        q8: 'I',
        q9: 'tomorrow',
        q10: 'is going'
    };

    let score = 0;

    // Compare answers, case-insensitive
    for (const question in answers) {
        if (answers[question].value.trim().toLowerCase() === correctAnswers[question].toLowerCase()) {
            score++;
        }
    }

    const resultContainer = document.getElementById('result');
    resultContainer.innerHTML = `<p>Your score: ${score}/10</p>`;

    // Redirect to the specified link if score is 10
    if (score === 10) {
        window.location.replace("https://www.canva.com/design/DAFXvJzNGOY/M4lVgqJgbgAv7TD1UYLKNg/edit?utm_content=DAFXvJzNGOY&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton");
    }
}

