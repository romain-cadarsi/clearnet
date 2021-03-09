
function addFioul(){
    $("#wizard1").steps("insert",4, {
        title: "fioul",
        contentMode: "async",
        contentUrl: "./chauffage/fioul"
    });
    newStep = 1;
}
function addElectrique(){
    $("#wizard1").steps("insert",4, {
        title: "elec",
        contentMode: "async",
        contentUrl: "./chauffage/electrique"
    });
    newStep = 1;
}
function addGaz(){
    $("#wizard1").steps("insert",4, {
        title: "gaz",
        contentMode: "async",
        contentUrl: "./chauffage/gaz"
    });
    newStep = 1;
}

function next(){
    $('#wizard1').steps('next')
}

function removeAddedSteps(){
    for(let i = 0 ; i < newStep ; i++){
        $('#wizard1').steps('remove',4);
    }
    newStep = 0;
}
function onStepChanged(index,priorIndex){
    if(index < priorIndex){
        if(index <= 3 && newStep !== 0){
            removeAddedSteps();
        }
    }
    if(index >= 6 + newStep ){
        $('.informations').removeClass('disabled')
    }
    else{
        $('.informations').addClass('disabled')
    }


}

function onNextStep(event,currentIndex,newIndex){
    if(currentIndex > newIndex){
        return true;
    }

    if(currentIndex === 3){
       if(toFetch !== ''){
           switch (toFetch){
               case "fioul" :
                   addFioul()
                   break
               case "elec" :
                   addElectrique();
                   break
               case "gaz" :
                   addGaz();
                   break
           }
       }
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