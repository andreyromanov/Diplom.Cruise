//////////////////////////

function paytype() {


  var e = document.getElementById("payselect");
  var type = e.options[e.selectedIndex].value;
  
  if (type == '1') { 

    document.getElementById('paydiv').innerHTML = '<div style="font-size: 18px;"><h2 align="center">Оплата наличными</h2><br><span>Офис компании находится по адресу: <b>Украина, г.Одесса, ул. Дерибасовская, 1А.</b></span><br><br><span>Время работы: <b>ПН-СБ с 9:00-18:00</b></span><br><br><span>Телефон: <b>+380 95 54 07 642</b></span><br><br><span>Email: <b>cruise@gmail.com</b></span></div>';

  } else if (type == '2'){

    document.getElementById('paydiv').innerHTML = '<div style="font-size: 18px;"><h2 align="center">Оплата через банк</h2><br><span>Номер карты получателя: <b>1234 4321 5678 8765</b></span><br><br><span>Получатель: <b>ПАТ "Круїз"</b></span><br><br><span>В назначении платежа указать : <br><b>Фамилия клиента/Название тура/Дата начала тура</b></span></div>';

  } else if (type == '3'){

    document.getElementById('paydiv').innerHTML = '<img src="/img/cabins/cabB.jpg" width="350px" height="350px" style="border-radius: 50px;">';

  } else if (type == ''){

    document.getElementById('paydiv').innerHTML = '';

  }

}

function pay() {
  document.getElementById('pay').setAttribute("style", ""); 
  document.getElementById('paybtn').setAttribute("style", "display: none;"); 
}


function f1() {
  alert("Для заказа необходимо войти или зарегистрироваться!");
  document.getElementById('101').setAttribute("style", ""); 
}

function fff() {

  var a = document.getElementById("price").value;
  var cab = document.getElementById("select1").value;
  var c = document.getElementById("select").value;
  var type = document.getElementById("select").value;
  var K = 0;

  var t1 = document.getElementById("t1").value;
  //var t2 = document.getElementById("t2");
  var e2; 
  var e3; 
  var e4; 
  var element = document.getElementById('t2');
  if (element != null) {
    e2 = element.value;
  }
  else {
    e2 = null;
  }
  
  var element = document.getElementById('t3');
  if (element != null) {
    e3 = element.value;
  }
  else {
    e3 = null;
  }

  var element = document.getElementById('t4');
  if (element != null) {
    e4 = element.value;
  }
  else {
    e4 = null;
  }
  
  if (t1=='A'){
    var K = 1;
  } else if (t1=='B'){
    var K = 0.5;
  }

  if (e2=='A'){
    var K2 = 1;
  } else if (e2=='B'){
    var K2 = 0.5;
  } else if (e2==null){
    var K2 = 0;
  }

  if (e3=='A'){
    var K3 = 1;
  } else if (e3=='B'){
    var K3 = 0.5;
  } else if (e3==null){
    var K3 = 0;
  }

  if (e4=='A'){
    var K4 = 1;
  } else if (e4=='B'){
    var K4 = 0.5;
  } else if (e4==null){
    var K4 = 0;
  }

  var K_All = K + K2 + K3 + K4;

  var price = parseInt(a, 10);
//  var cab = parseInt(b, 10);
var numb = parseInt(c, 10);
// D cabins
if (cab=='D'){
  var fprice = price*K_All*1;
} 

// C cabins
else if (cab=='C'){
  var fprice = price*K_All*1.5;
} 

//B cabins
else if (cab=='B'){
  var fprice = price*K_All*2;
} 

//A cabin
else if (cab=='A'){
  var fprice = price*K_All*3;
}
var sum  = fprice;

document.getElementById("fsumid").value = sum;

}

function input() {
	

	var e = document.getElementById("select");
	var numb = e.options[e.selectedIndex].text;
	
  if (numb == 1) { 
    document.getElementById('111').innerHTML = '<input type="text" name="fn1" placeholder="Имя" required>  <input type="text" name="ln1" placeholder=" Фамилия" required> <select onchange="fff()" id="t1" name="t1" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><div class="form-group"><label for="exampleFormControlFile1">Прикрепите фото документа, подтверждающего право на скидку.</label><input type="file" class="form-control-file" id="exampleFormControlFile1" name="image"></div>';
  } else if (numb == 2){
    document.getElementById('111').innerHTML = '<input type="text" name="fn1" placeholder="Имя" required>  <input type="text" name="ln1" placeholder=" Фамилия" required> <select onchange="fff()" id="t1" name="t1" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select> <br><br><input type="text" name="fn2" placeholder="Имя">  <input type="text" name="ln2" placeholder=" Фамилия"> <select onchange="fff()" id="t2" name="t2" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><div class="form-group"><label for="exampleFormControlFile1">Прикрепите фото документа, подтверждающего право на скидку.</label><input type="file" class="form-control-file" id="exampleFormControlFile1" name="image"></div>';
  } else if (numb == 3){
    document.getElementById('111').innerHTML = '<input type="text" name="fn1" placeholder="Имя" required>  <input type="text" name="ln1" placeholder=" Фамилия" required> <select onchange="fff()" id="t1" name="t1" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select> <br><br><input type="text" name="fn2" placeholder="Имя">  <input type="text" name="ln2" placeholder=" Фамилия"> <select onchange="fff()" id="t2" name="t2" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><input type="text" name="fn3" placeholder="Имя">  <input type="text" name="ln3" placeholder=" Фамилия">  <select onchange="fff()" id="t3" name="t3" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><div class="form-group"><label for="exampleFormControlFile1">Прикрепите фото документа, подтверждающего право на скидку.</label><input type="file" class="form-control-file" id="exampleFormControlFile1" name="image"></div>';
  } else if (numb == 4){
    document.getElementById('111').innerHTML = '<input type="text" name="fn1" placeholder="Имя" required>  <input type="text" name="ln1" placeholder=" Фамилия" required> <select onchange="fff()" id="t1" name="t1" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select> <br><br><input type="text" name="fn2" placeholder="Имя">  <input type="text" name="ln2" placeholder=" Фамилия"> <select onchange="fff()" id="t2" name="t2" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><input type="text" name="fn3" placeholder="Имя">  <input type="text" name="ln3" placeholder=" Фамилия">  <select onchange="fff()" id="t3" name="t3" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><input type="text" name="fn4" placeholder="Имя">  <input type="text" name="ln4" placeholder=" Фамилия">  <select onchange="fff()" id="t4" name="t4" class="selectpicker" style="font-size: 19px;" required><option value="A">Обычный</option><option value="B">Детский</option></select><br><br><div class="form-group"><label for="exampleFormControlFile1">Прикрепите фото документа, подтверждающего право на скидку.</label><input type="file" class="form-control-file" id="exampleFormControlFile1" name="image"></div>';
  } else if (numb == '---'){
    document.getElementById('111').innerHTML = '';
  }
}
//////////////////////////
function cabin() {

	var e = document.getElementById("select1");
	var numb = e.options[e.selectedIndex].value;
	
	if (numb == 'D') { 

		document.getElementById('CabsA').setAttribute("style", "display:none;"); 
		document.getElementById('CabsB').setAttribute("style", "display:none;"); 
		document.getElementById('CabsC').setAttribute("style", "display:none;"); 
		document.getElementById('CabsD').setAttribute("style", ""); 
		document.getElementById('222').innerHTML = '<img src="/img/cabins/cabD.jpg" width="350px" height="350px" style="border-radius: 50px;">';

	} else if (numb == 'C'){
		
		document.getElementById('CabsA').setAttribute("style", "display:none;"); 
		document.getElementById('CabsB').setAttribute("style", "display:none;"); 
		document.getElementById('CabsD').setAttribute("style", "display:none;"); 
		document.getElementById('CabsC').setAttribute("style", "");
		document.getElementById('222').innerHTML = '<img src="/img/cabins/cabC.jpg" width="350px" height="350px" style="border-radius: 50px;">';

	} else if (numb == 'B'){
		
		document.getElementById('CabsA').setAttribute("style", "display:none;"); 
		document.getElementById('CabsD').setAttribute("style", "display:none;"); 
		document.getElementById('CabsC').setAttribute("style", "display:none;"); 
		document.getElementById('CabsB').setAttribute("style", "");
		document.getElementById('222').innerHTML = '<img src="/img/cabins/cabB.jpg" width="350px" height="350px" style="border-radius: 50px;">';

	} else if (numb == 'A'){
		
		document.getElementById('CabsD').setAttribute("style", "display:none;"); 
		document.getElementById('CabsB').setAttribute("style", "display:none;"); 
		document.getElementById('CabsC').setAttribute("style", "display:none;"); 
		document.getElementById('CabsA').setAttribute("style", "");
		document.getElementById('222').innerHTML = '<img src="/img/cabins/cabA.jpg" width="350px" height="350px" style="border-radius: 50px;">';

	} else if (numb == ''){
		
		document.getElementById('CabsA').setAttribute("style", "display:none;"); 
		document.getElementById('CabsB').setAttribute("style", "display:none;"); 
		document.getElementById('CabsC').setAttribute("style", "display:none;"); 
		document.getElementById('CabsD').setAttribute("style", "display:none;"); 
		document.getElementById('222').innerHTML = '';

	}
}
