$(document).ready(function () {
    // Add something to given element placeholder
    function addToPlaceholder(toAdd, el) {
        el.html(el.html() + toAdd);
        // el.attr('placeholder', el.attr('placeholder') + toAdd);
        // Delay between symbols "typing" 
        return new Promise(resolve => setTimeout(resolve, 200));
    }

    // Cleare placeholder attribute in given element
    // function clearPlaceholder(el) {
    //     el.attr("placeholder", "");
    // }

    // Print one phrase
    function printPhrase(phrase, el, item, count) {
        el.html('');
        return new Promise(resolve => {
            // Clear placeholder before typing next phrase
            // clearPlaceholder(el);
            let letters = phrase.split('');
            // For each letter in phrase
            letters.reduce(
                (promise, letter, index) => promise.then(_ => {
                    // Resolve promise when all letters are typed
                    if (index === letters.length - 1) {
                        // Delay before start next phrase "typing"
                        setTimeout(resolve, 4000);
                        $('.typing').remove();
                        if (item === count) {
                            setTimeout(run, 4000);
                        }
                    }
                    return addToPlaceholder(letter, el);
                }),
                Promise.resolve()
            );
        });
    } 

    // Print given phrases to element
    function printPhrases(phrases, el) {
        // For each phrase
        // wait for phrase to be typed
        // before start typing next
        phrases.reduce(
            (promise, phrase, item) => promise.then(_ => printPhrase(phrase, el, item + 1, phrases.length)),
            Promise.resolve()
        );
    }

    // Start typing
    function run() {
        let phrasesAboutUs = [
            "Nào Cùng Đi",
            "Cẩm nang du lịch",
            "Kinh nghiệm du lịch",
            "Du lịch tự túc tiết kiệm"
        ];

        printPhrases(phrasesAboutUs, $('.inner-banner h1'));
    }

    run();
})