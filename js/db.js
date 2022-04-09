

function howManyOptions() {
    let $options = document.getElementsByClassName('pool-section');
    return $options.length - 1;
};


function verifyInputs() {
    let $ret = '';
    let $title = document.getElementById('pool_title');
    let $this_option = document.getElementById('option1');
    let $totalInputs = howManyOptions();
    if ($title.value.length == 0) {
        $ret = `You can't create a pool with empty title!`;
    }else if ($this_option.value.length == 0){
        $ret = `You can't create a pool without options!`;
    }else if ($totalInputs == 1) {
        $ret = `You can't create a pool with only one option!`;
    }
    if ($ret == ''){
            return true;
    }
    alert($ret);
    return false;
}
