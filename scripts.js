let questionCounter = 0;

function showQuestion() {
    const questions = [
        "Are you an Apple product user?",
        "What is your favorite feature from iPhone 11?"
    ];

    const answers = [
        ["Yes", "No"],
        ["Ultra Wide and Wide lenses", "Dual-lens rear camera", "Splash, Water, and Dust Resistant"]
    ];

    const container = document.querySelector(".container");

    // Hide image and show question
    container.innerHTML = `
        <div class="prelander-img">
            <img src="https://img17.com/pl/1/IMG_P1_2_IPHONE11ALL.png" alt="Prelander Page">
        </div>
        <div class="question">
            ${questions[questionCounter]}
            <div class="btn-group">
                ${answers[questionCounter].map(answer => `<button onclick="nextPage('${answer}')">${answer}</button>`).join("")}
            </div>
        </div>
    `;
}

function nextPage(answer) {
    // If answer is "No" and it's the first question, redirect to index.html
    if (questionCounter === 0 && answer === "No") {
        window.location.href = "mobile.html";
        return;
    }

    // Redirect to Google if it's the last question
    if (questionCounter === 1) {
        window.location.href = "https://www.google.com";
        return;
    }

    // Increment question counter
    questionCounter++;

    // Show next question
    showQuestion();
}