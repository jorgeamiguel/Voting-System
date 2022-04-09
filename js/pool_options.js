function checkQuestion(option) {
    let $next_question = document.getElementById('option' + option);
    if (!isOptionEmpty(option - 1)) {
        if (!$next_question) {
            createOption(option);
        }
    }
    else if ($next_question) {
        removeOption(option);
    }
}

let isOptionEmpty = (option => {
    let $this_option = document.getElementById('option' + option);
    return $this_option.value.length > 0 ? false : true;
});

let createOption = (option => {
    const future_option = option + 1;
    let container = document.getElementsByClassName('pool-div')[0];

    // Create section
    let section = document.createElement("section");
    section.id = `option_section${option}`;
    section.className = `pool-section`;
    container.appendChild(section);

    // Create label
    let label = document.createElement("label");
    label.htmlFor = `option${option}`;
    label.id = `label_option${option}`;
    label.textContent = `Option ${option}: `;
    section.appendChild(label);

    // Create input
    let input = document.createElement("input");
    input.type = "text"; input.name = `option[${option}]`;
    input.id = `option${option}`
    input.onchange = function () {
        checkQuestion(future_option);
    }
    section.appendChild(input);
    section.appendChild(document.createElement("br"));
    section.appendChild(document.createElement("br"));
});

let removeOption = (option => {
    let $next_section = document.getElementById('option' + (option + 1));
    if ($next_section) {
        removeOption(option + 1)
    }
    let $option_section = document.getElementById('option_section' + option);
    $option_section.remove();
});