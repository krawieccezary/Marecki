

/*************************** MATERIAŁ ****************************/

/*******************
    DODAJ PŁYTĘ
*******************/


document.getElementById('dodaj_plyte').addEventListener('click', function (event) {
    event.preventDefault();

    var node = document.createElement('li');

    var labelPlyta = document.createElement('label');
    labelPlyta.setAttribute('for', 'plyta');
    var textLabelPlyta = document.createTextNode('Cena płyty: ');

    var inputPlyta = document.createElement('input');
    inputPlyta.setAttribute('type', 'number');

    var labelIloscPlyt = document.createElement('label');
    labelIloscPlyt.setAttribute('for', 'ilosc_plyt');
    var textLabelIloscPlyt = document.createTextNode(' Ilość płyt: ');

    var inputIloscPlyt = document.createElement('input');
    inputIloscPlyt.setAttribute('type', 'number');

    var inputIloscPlyt = document.createElement('input');
    inputIloscPlyt.setAttribute('type', 'number');

    var kosztDanegoDekoru = document.createElement('p');
     var removeButton = document.createElement('button');
    removeButton.setAttribute('class', 'remove');
    removeButton.setAttribute('data-action', 'remove');
    removeButton.setAttribute('type', 'button');
    var removeX = document.createElement('span');
    removeButton.appendChild(removeX);
    removeButton.appendChild(removeX);

    node.appendChild(labelPlyta).appendChild(textLabelPlyta);
    node.appendChild(inputPlyta);
    node.appendChild(labelIloscPlyt).appendChild(textLabelIloscPlyt);
    node.appendChild(inputIloscPlyt);
    node.appendChild(kosztDanegoDekoru);
    node.appendChild(removeButton);

    document.getElementById('lista_plyt').appendChild(node);
});




/*********************
     DODAJ OBRZEŻE
**********************/

    var powiązanie = 0;

document.getElementById('dodaj_obrzeze').addEventListener('click', function (event) {
    event.preventDefault();

    var node = document.createElement('li');
    powiązanie++;

    var wyborObrzeza = document.createElement('select');
    wyborObrzeza.setAttribute('name', 'obrzeże');

    var option1 = document.createElement('option');
    option1.text = '22/0.5';
    option1.value = 1;
    wyborObrzeza.options.add(option1);
    var option2 = document.createElement('option');
    option2.text = '22/0.8';
    option2.value = 1.2;
    wyborObrzeza.options.add(option2);
    var option3 = document.createElement('option');
    option3.text = '22/0.8 Połysk';
    option3.value = 2.90;
    wyborObrzeza.options.add(option3);
    var option4 = document.createElement('option');
    option4.text = '22/1 Połysk';
    option4.value = 3;
    wyborObrzeza.add(option4);
    var option5 = document.createElement('option');
    option5.text = '22/2';
    option5.value = 2.80;
    wyborObrzeza.add(option5);
    var option6 = document.createElement('option');
    option6.text = '42/0.8';
    option6.value = 5;
    wyborObrzeza.add(option6);
    var option7 = document.createElement('option');
    option7.text = '42/1 Połysk';
    option7.value = 7;
    wyborObrzeza.add(option7);
    var option8 = document.createElement('option');
    option8.text = '42/2';
    option8.value = 6;
    wyborObrzeza.add(option8);


    var labelObrzezeMetry = document.createElement('label');
    labelObrzezeMetry.setAttribute('for', 'obrzeże_metry');
    var textLabelObrzezeMetry = document.createTextNode(' Ilość metrów: ');

    var inputObrzezeMetry = document.createElement('input');
    inputObrzezeMetry.setAttribute('type', 'number');

    var kosztDanegoObrzeza = document.createElement('p');
    var removeButton = document.createElement('button');
    removeButton.setAttribute('class', 'remove remove_obrzeze');
    removeButton.setAttribute('data-action', 'remove');
    removeButton.setAttribute('data-number', powiązanie);
    removeButton.setAttribute('type', 'button');
    var removeX = document.createElement('span');
    removeButton.appendChild(removeX);
    removeButton.appendChild(removeX);

    node.appendChild(wyborObrzeza);
    node.appendChild(labelObrzezeMetry).appendChild(textLabelObrzezeMetry);
    node.appendChild(inputObrzezeMetry);
    node.appendChild(kosztDanegoObrzeza);
    node.appendChild(removeButton);
    document.getElementById('lista_obrzeży').appendChild(node);


    dodajOklejanie(powiązanie);
});


var clone = function(){

    var obrzezeNodeList = document.getElementById('lista_obrzeży').querySelectorAll('li');
    var oklejanieNodeList = document.getElementById('lista_oklejanie').querySelectorAll('li');

    for (i = 0; i < obrzezeNodeList.length; i++) {
        var rozmiarObrzeza = obrzezeNodeList[i].childNodes[0].options[obrzezeNodeList[i].childNodes[0].selectedIndex].innerHTML;
        var iloscObrzeza = obrzezeNodeList[i].childNodes[2].value;
       // console.log(rozmiarObrzeza);

        if (oklejanieNodeList[i]) {
            if (oklejanieNodeList[i].childNodes[2].value !== iloscObrzeza) {
                oklejanieNodeList[i].childNodes[2].value = iloscObrzeza;
            }


            if (oklejanieNodeList[i].childNodes[0].selectedIndex !== obrzezeNodeList[i].childNodes[0].selectedIndex) {

               oklejanieNodeList[i].childNodes[0].selectedIndex = obrzezeNodeList[i].childNodes[0].selectedIndex;
            }
        };
    };
};

if (true){
        setInterval(function(){
            clone();
           // wycena();
        }, 100);

};





/*************************** USŁUGI ****************************/



/*********************
     DODAJ OKLEJANIE
**********************/


 var dodajOklejanie = function(powiązanie){

     var node = document.createElement('li');


    var wyborOklejania = document.createElement('select');
    wyborOklejania.setAttribute('class', 'oklejanie');


    var option1 = document.createElement('option');
    option1.text = '22/0.5';
    wyborOklejania.options.add(option1);

    var option2 = document.createElement('option');
    option2.text = '22/0.8';
    wyborOklejania.options.add(option2);

    var option3 = document.createElement('option');
    option3.text = '22/0.8 Połysk';
    wyborOklejania.options.add(option3);

    var option4 = document.createElement('option');
    option4.text = '22/1 Połysk';
    wyborOklejania.add(option4);

    var option5 = document.createElement('option');
    option5.text = '22/2';
    wyborOklejania.add(option5);

    var option6 = document.createElement('option');
    option6.text = '42/0.8';
    wyborOklejania.add(option6);

    var option7 = document.createElement('option');
    option7.text = '42/1 Połysk';
    wyborOklejania.add(option7);

    var option8 = document.createElement('option');
    option8.text = '42/2';
    wyborOklejania.add(option8);


    var labelOklejanieMetry = document.createElement('label');
    labelOklejanieMetry.setAttribute('for', 'oklejanie_metry');
    var textLabelOklejanieMetry = document.createTextNode(' Ilość metrów: ');

    var inputOklejanieMetry = document.createElement('input');
    inputOklejanieMetry.setAttribute('type', 'number');

    var kosztDanegoOklejania = document.createElement('p');
    var removeButton = document.createElement('button');
    removeButton.setAttribute('class', 'remove');
    removeButton.setAttribute('data-action', 'remove');
    removeButton.setAttribute('data-number', powiązanie);
    removeButton.setAttribute('type', 'button');
    var removeX = document.createElement('span');
    removeButton.appendChild(removeX);
    removeButton.appendChild(removeX);

    node.appendChild(wyborOklejania);
    node.appendChild(labelOklejanieMetry).appendChild(textLabelOklejanieMetry);
    node.appendChild(inputOklejanieMetry);
    node.appendChild(kosztDanegoOklejania);
    node.appendChild(removeButton);

    document.getElementById('lista_oklejanie').appendChild(node);

};




document.getElementById('dodaj_oklejanie').addEventListener('click', function (event) {
    event.preventDefault();
    dodajOklejanie();

    });


/**************************
        BUTTON REMOVE
***************************/

document.body.addEventListener('click', function(e){

    if (e.target.dataset.action == 'remove') {
        var parent = e.target.parentElement;
        parent.parentNode.removeChild(parent);
    };

    var oklejanieNodeList = document.getElementById('lista_oklejanie').querySelectorAll('li');

    if (e.target.classList.contains('remove_obrzeze')) {

        for (var i=0; i<oklejanieNodeList.length; i++) {

            var removeButton = oklejanieNodeList[i].lastElementChild;

           if (removeButton.dataset.number == e.target.dataset.number) {

               removeButton.parentElement.parentElement.children[i].remove();

           };
        };
    };

});




/**************************
        BUTTON RELOAD
***************************/

document.getElementById('reload').addEventListener('click', function(){
    location.reload();
});



/**********************************************
                FUNKCJA WYCENA
************************************************/

function wycena(event) {

    event.preventDefault();
/***************** MATERIAŁ **********************/

    var rabat = document.getElementById('rabat').value;
    var rabatLiczba = 1 - rabat / 100;


    var i;
    var cenaPlyty, iloscPlyt = 0, cenaDekoru, cenaDanegoObrzeza, kosztObrzeza = 0;
    var kosztPlyt = 0,
        kosztObrzeza = 0, materialRazem = 0, wynikKoncowy, wynikMaterial = 0;


/********************
        PŁYTY
*********************/

    var plytaNodeList = document.getElementById('lista_plyt').querySelectorAll('li');

    for (i = 0; i < plytaNodeList.length; i++) {

        cenaPlyty = plytaNodeList[i].childNodes[1].value;
        iloscPlyt = plytaNodeList[i].childNodes[3].value;


        cenaDekoru = parseFloat(cenaPlyty) * parseFloat(iloscPlyt) * rabatLiczba;
        cenaDekoru = cenaDekoru.toFixed(2);
        cenaDekoru = parseFloat(cenaDekoru);

        plytaNodeList[i].childNodes[4].innerHTML = cenaDekoru + ' brutto';


        kosztPlyt += cenaDekoru;
       // materialRazem = wynikMaterial.toFixed(2);
        console.log(typeof(iloscPlyt));
        console.log(typeof(kosztPlyt));
        console.log(kosztPlyt);

    };



/********************
       OBRZEŻE
*********************/


    var obrzezeNodeList = document.getElementById('lista_obrzeży').querySelectorAll('li');

    for (i = 0; i < obrzezeNodeList.length; i++) {
        cenaObrzeza = obrzezeNodeList[i].childNodes[0].value;
        iloscObrzeza = obrzezeNodeList[i].childNodes[2].value;

        cenaDanegoObrzeza = parseFloat(cenaObrzeza) * parseFloat(iloscObrzeza) * rabatLiczba;
        cenaDanegoObrzeza = cenaDanegoObrzeza.toFixed(2);
        cenaDanegoObrzeza = parseFloat(cenaDanegoObrzeza);
        obrzezeNodeList[i].childNodes[3].innerHTML = cenaDanegoObrzeza + ' brutto';

        kosztObrzeza += cenaDanegoObrzeza;
       // materialRazem = wynikMaterial.toFixed(2);
     //   console.log(kosztObrzeza);

    };


    materialRazem = parseFloat(kosztPlyt) + parseFloat(kosztObrzeza);
   // console.log(materialRazem);

    document.getElementById('material_razem').innerHTML = materialRazem + ' brutto';




/********************** USŁUGI ********************/

    var radioHurtDetal = document.querySelector('input[name="ceny"]:checked');

    if (radioHurtDetal) {

        document.getElementById('alert_hurt/detal').setAttribute('style', 'display: none');

        var cenyOption = document.querySelector('input[name="ceny"]:checked').value;
        console.log(cenyOption);

        var cenaOklejania, iloscMetrowOklejania, cenaDanegoOklejania, kosztCiecia, cenaDanegoCiecia, iloscMetrowCiecia = 0;
        var uslugiRazem, kosztOklejania = 0;
    }
    else {

        document.getElementById('alert_hurt/detal').setAttribute('style', 'display: block');
        document.getElementById('alert_hurt/detal').innerHTML = 'Zaznacz pole!';

        return;
    }





/************************
        HURT/DETAL
*************************/

    var selectOklejanie =  document.getElementsByClassName('oklejanie');


    if (selectOklejanie) {

        if (cenyOption == 'hurt') {

            for (var i=0; i<selectOklejanie.length; i++){

                selectOklejanie[i].options[0].value = 1.55;    /* 22/0,5 */
                selectOklejanie[i].options[1].value = 1.85;    /* 22/0,8 */
                selectOklejanie[i].options[4].value = 2.2;     /* 22/2   */
                selectOklejanie[i].options[5].value = 4;     /* 42/0.8   */
                selectOklejanie[i].options[7].value = 4;       /* 42/2   */
            }
        }

        else {

             for (var i=0; i<selectOklejanie.length; i++){

                selectOklejanie[i].options[0].value = 2;    /* 22/0,5 */
                selectOklejanie[i].options[1].value = 2.2;    /* 22/0,8 */
                selectOklejanie[i].options[4].value = 2.7;     /* 22/2   */
                selectOklejanie[i].options[5].value = 4;     /* 42/0.8   */
                selectOklejanie[i].options[7].value = 4;       /* 42/2   */
            }
        }
    };

    if (cenyOption == 'hurt') cenaDanegoCiecia = 1.23;
    else cenaDanegoCiecia = 2;


/************************
        OKLEJANIE
*************************/

     var oklejanieNodeList = document.getElementById('lista_oklejanie').querySelectorAll('li');

    for (i = 0; i < oklejanieNodeList.length; i++) {

        cenaOklejania = oklejanieNodeList[i].childNodes[0].value;
       // cenaOklejania = oklejanieNodeList[i].value;
        iloscMetrowOklejania = oklejanieNodeList[i].childNodes[2].value;

        cenaDanegoOklejania = parseFloat(cenaOklejania) * parseFloat(iloscMetrowOklejania);
        cenaDanegoOklejania = cenaDanegoOklejania.toFixed(2);
        cenaDanegoOklejania = parseFloat(cenaDanegoOklejania);
        oklejanieNodeList[i].childNodes[3].innerHTML = cenaDanegoOklejania + ' brutto';


        kosztOklejania += cenaDanegoOklejania;
        var y = kosztOklejania.toFixed(2);
        kosztOklejania = parseFloat(y);


        console.log(typeof(kosztOklejania));
        console.log(cenaOklejania);
        console.log(iloscMetrowOklejania);
      //  console.log(oklejanieNodeList);
    };



 /************************
        CIĘCIE
*************************/

    var ciecieMetry = document.getElementById('ciecie').value;

    kosztCiecia = ciecieMetry * cenaDanegoCiecia;

    var x = kosztCiecia.toFixed(2);

    kosztCiecia = parseFloat(x);

    document.getElementById('metry_ciecia').innerHTML = ' ' + kosztCiecia + ' brutto';


    console.log(kosztCiecia);


    if (isNaN(kosztOklejania)){
        uslugiRazem = kosztCiecia;
        console.log('sss');
    }
    else {
        uslugiRazem = kosztCiecia + kosztOklejania;
        x = uslugiRazem.toFixed(2);
        uslugiRazem = parseFloat(x);
    }

 /************************
        PODSUMOWANIE
*************************/



    wynikKoncowy = materialRazem + uslugiRazem;


    document.getElementById('uslugi_razem').innerHTML = ' ' + uslugiRazem + ' brutto';

    document.getElementById('wynik').innerHTML = wynikKoncowy + ' brutto';

};

document.getElementById("policz").addEventListener('click', wycena);




/************************
        USTAWIENIA
*************************/

  var pudelko = document.getElementById('pudelko');
  var policz_button = document.getElementById('policz');
  var zapisz_submit = document.getElementById('zapisz_ustawienia');

  document.getElementById('ustawienia_button').addEventListener('click', function(){
     pudelko.classList.toggle('ustawienia');
  });
