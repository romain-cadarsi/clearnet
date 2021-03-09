
function addCombles(){
    $("#wizard1").steps("insert",3, {
        title: "SurfaceCombles",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface de combles à isoler&help=Surface à isoler en m²&name=isolation_comble"
    });
    $("#wizard1").steps("insert",3, {
        title: "Combles",
        contentMode: "async",
        contentUrl: "./isolation/combles"
    });
    newStep = 2;
}

function addVideSanitaire(){
    $("#wizard1").steps("insert",3, {
        title: "HauteurSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la hauteur du vide sanitaire&help=Hauteur sous plafond en cm&name=vide_sanitaire"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Surface à isoler en m²&name=sous_sol"
    });
    newStep = 2;
}

function addCaveOuGarage(){
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Surface à isoler en m²&name=sous_sol"
    });
    newStep = 1;
}

function addMultipleSousSol(){
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Total de la surface à isoler en m²&name=sous_sol"
    });
    newStep = 1;
}

function addMultipleSousSolAndVideSanitaire(){

    $("#wizard1").steps("insert",3, {
        title: "HauteurSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la hauteur du vide sanitaire&help=Hauteur sous plafond en cm&name=vide_sanitaire"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Total de la surface à isoler en m²&name=sous_sol"
    });
    newStep = 2;
}
function addVideSanitaireAndCombles(){
    $("#wizard1").steps("insert",3, {
        title: "HauteurSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la hauteur du vide sanitaire&help=Hauteur sous plafond en cm&name=vide_sanitaire"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Surface à isoler en m²&name=sous_sol"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceCombles",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface de combles à isoler&help=Surface à isoler en m²&name=isolation_comble"
    });
    $("#wizard1").steps("insert",3, {
        title: "Combles",
        contentMode: "async",
        contentUrl: "./isolation/combles"
    });
    newStep = 4;
}
function addCaveOuGarageAndCombles(){
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Surface à isoler en m²&name=sous_sol"
    });

    $("#wizard1").steps("insert",3, {
        title: "SurfaceCombles",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface de combles à isoler&help=Surface à isoler en m²&name=isolation_comble"
    });
    $("#wizard1").steps("insert",3, {
        title: "Combles",
        contentMode: "async",
        contentUrl: "./isolation/combles"
    });
    newStep = 3;
}

function addMultipleSousSolAndVideSanitaireAndCombles(){
    $("#wizard1").steps("insert",3, {
        title: "HauteurSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la hauteur du vide sanitaire&help=Hauteur sous plafond en cm&name=vide_sanitaire"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Total de la surface à isoler en m²&name=sous_sol"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceCombles",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface de combles à isoler&help=Surface à isoler en m²&name=isolation_comble"
    });
    $("#wizard1").steps("insert",3, {
        title: "Combles",
        contentMode: "async",
        contentUrl: "./isolation/combles"
    });
    newStep = 4;
}
function addMultipleSousSolAndCombles(){
    $("#wizard1").steps("insert",3, {
        title: "SurfaceSousSol",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface totale du sous-sol à isoler&help=Total de la surface à isoler en m²&name=sous_sol"
    });
    $("#wizard1").steps("insert",3, {
        title: "SurfaceCombles",
        contentMode: "async",
        contentUrl: "./chiffre?title=la surface de combles à isoler&help=Surface à isoler en m²&name=isolation_comble"
    });
    $("#wizard1").steps("insert",3, {
        title: "Combles",
        contentMode: "async",
        contentUrl: "./isolation/combles"
    });
    newStep = 3;
}


function next(){
    $('#wizard1').steps('next')
}

function addToFetch(e,page){
    if(e.target.checked){
        toFetch.push(page)
    }
    else{
        if(toFetch.findIndex((element) => element === page) !== -1 ){
            toFetch.splice(toFetch.findIndex((element) => element === page),1)
        }
    }
}
function removeAddedSteps(){
    for(let i = 0 ; i < newStep ; i++){
        $('#wizard1').steps('remove',3);
    }
    newStep = 0;
}
function onStepChanged(index,priorIndex){
    if(index < priorIndex){
        if(index <= 2 && newStep !== 0){
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

    if(currentIndex === 2){
        toFetch.sort()
        let choices = JSON.stringify(toFetch);
        if(choices === JSON.stringify([])){
            return false;
        }
        if(choices === JSON.stringify(["combles"])){ addCombles() }
        else if(choices === JSON.stringify(["garage_sous_sol"])){ addCaveOuGarage() }
        else if(choices === JSON.stringify(["garage_sous_sol",'garage_sous_sol'])){ addMultipleSousSol() }
        else if(choices === JSON.stringify(["vide_sanitaire"])){ addVideSanitaire() }
        else if(choices === JSON.stringify(['garage_sous_sol',"vide_sanitaire"])){ addMultipleSousSolAndVideSanitaire() }
        else if(choices === JSON.stringify(['garage_sous_sol','garage_sous_sol',"vide_sanitaire"])){ addMultipleSousSolAndVideSanitaire() }
        else if(choices === JSON.stringify(["combles",'garage_sous_sol'])){ addCaveOuGarageAndCombles() }
        else if(choices === JSON.stringify(["combles",'vide_sanitaire'])){ addVideSanitaireAndCombles() }
        else if(choices === JSON.stringify(["combles",'garage_sous_sol', 'garage_sous_sol'])){ addMultipleSousSolAndCombles() }
        else if(choices === JSON.stringify(["combles",'garage_sous_sol', 'garage_sous_sol','vide_sanitaire'])){ addMultipleSousSolAndVideSanitaireAndCombles() }
        return true;
    }
    return inputsMustNotBeEmpty();
}

function getPieces(){
    let pieces = [];
    $('#wizard1').find('.pieces').find('input[type="checkbox"]:checked').each(function (){
        pieces.push($(this).val())
    })
    return pieces
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