   function checkQuestion(option) {
        let $pool_div = document.getElementsByClassName('pool-div')[0];
        let $next_question = document.getElementById('option'+option);
        if (!isOptionEmpty(option-1)){
            if (!$next_question) {
                createOption(option);
            }
        }
        else if ($next_question) {
            removeOption(option);
        }
    }

    let isOptionEmpty = (option => {
        let $this_option = document.getElementById('option'+option);
        return $this_option.value.length > 0 ? false : true;
    });

    let createOption = (option => {
        let $pool_div = document.getElementsByClassName('pool-div')[0];
        const future_option = option + 1;
        const newHTML = `<section id="option_section${option}"  class="pool-section">
                            <label for="option${option}" id="label_option${option}">Option ${option}:</label>
                            <input type="text" id="option${option}" name="option[${option}]" onchange="checkQuestion(${future_option})"><br><br>
                        </section>`;
        $pool_div.insertAdjacentHTML('beforeend', newHTML);
    });

    let removeOption = (option => {
        let $next_section = document.getElementById('option'+(option+1));
        if ($next_section){
            removeOption(option+1)
        }
        let $option_section = document.getElementById('option_section'+option);
        let $option = document.getElementById('option'+option);
        $option_section.remove();
    });