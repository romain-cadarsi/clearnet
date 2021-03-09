
function next(){
    $('#wizard1').steps('next')
}

function onNextStep(event,currentIndex,newIndex){
    if(currentIndex > newIndex){
        return true;
    }
    return inputsMustNotBeEmpty();
}

function inputsMustNotBeEmpty(){
    if($('#wizard1').find('.body.current').find('.radio')[0] !== undefined){
        if($('#wizard1').find('.body.current').find('input[type="radio"]:checked').val() === undefined ||
            $('#wizard1').find('.body.current').find('input[type="radio"]:checked').val() === "" ||
            $('#wizard1').find('.body.current').find('input[type="radio"]:checked').val() === []) {
            return false;
        }

    }

    if($('#wizard1').find('.body.current').find('.text')[0] !== undefined) {
        if ($($('#wizard1').find('.body.current').find('.text')[0]).find('input').val() === undefined ||
            $($('#wizard1').find('.body.current').find('.text')[0]).find('input').val() === "") {
            return false;
        }
    }

    return true;
}