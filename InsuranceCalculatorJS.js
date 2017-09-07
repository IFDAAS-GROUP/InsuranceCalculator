var currency = document.getElementById("insCur").value;
document.getElementById("currency").innerHTML = " " + currency;
var insSum = document.getElementById("insSum").value;
var insSum_selected = document.getElementById("insSum").value;
var Kpr = document.getElementById("Kpr").value;
var Kfr = document.getElementById("Kfr").value;
var Kter = document.getElementById("Kter").value;
var dateStart = "";
var dateStop = "";
var SPb = "";
var multi_visa_period = 1;
var SP = "";
var SPb_accident = "";
var days;
var qwe;
var K1 = 1;
var K2 = 1;
var K3 = 1;
var K4 = 1;
var K5 = 1;
var tourists = 1;
var rate = 1;
var rate_arr;
var SSnv = 0;
var SPtr = 0;
var SPnv = 0;
var SPzag = 0;
var flag = 0;
var flag_acc = 0;
var regName = new RegExp("^[A-z]+$");
var regpass_series = new RegExp("^[A-Z]{2}$");
var regpass_num = new RegExp("^[0-9]{6}$");
var insurancePaymentForOneDay_oneTrip = [
											[0.24, 0.22, 0.2, 0.18, 0.16, 0.14], 
											[0.26, 0.24, 0.21, 0.19, 0.17, 0.15], 
											[0.35, 0.32, 0.29, 0.25, 0.22, 0.19]
										];
var insurancePaymentForOneDay_muliTrip = [
											[4, 4, 8, 15, 19, 10, 17, 20, 30], 
											[5, 5, 10, 17, 23, 12, 20, 25, 40], 
										];
var insurancePaymentForOneDay_oneTrip_acc = [0.045, 0.07, 0.127, 0.303, 0.61, 0.956];
var insurancePaymentForOneDay_muliTrip_acc = [0.1, 0.13, 0.215, 0.456, 0.530, 0.368, 0.629, 0.783, 1.278];
var K5_factor = [1, 0.95, 0.9, 0.85, 0.8];
//Коригуючі коефіцієнти в залежності від кількості Застрахованих осіб
document.getElementById("tourists").onchange = function() {
	tourists = document.getElementById("tourists").value;
	if (tourists == 1) {
		document.getElementById("K4_2_div").style.display = "none";
		document.getElementById("K4_3_div").style.display = "none";
		document.getElementById("K4_4_div").style.display = "none";
	}
	if (tourists == 2) {
		document.getElementById("K4_2_div").style.display = "inline-block";
		document.getElementById("K4_3_div").style.display = "none";
		document.getElementById("K4_4_div").style.display = "none";
	}
	if (tourists == 3) {
		document.getElementById("K4_2_div").style.display = "inline-block";
		document.getElementById("K4_3_div").style.display = "inline-block";
		document.getElementById("K4_4_div").style.display = "none";
	}
	if (tourists == 4) {
		document.getElementById("K4_2_div").style.display = "inline-block";
		document.getElementById("K4_3_div").style.display = "inline-block";
		document.getElementById("K4_4_div").style.display = "inline-block";
	}

	if (tourists < 3) {
		K5 = K5_factor[0];
	}
	if (tourists > 2 && tourists < 11) {
		K5 = K5_factor[1];
	}
	if (tourists > 10 && tourists < 21) {
		K5 = K5_factor[2];
	}
	if (tourists > 20 && tourists < 51) {
		K5 = K5_factor[3];
	}
	if (tourists > 50) {
		K5 = K5_factor[4];
	}
	countSPzag();
}
//Получение курса валюты на текущую дату
document.addEventListener("DOMContentLoaded", function(event) { 
  var xhttp = new XMLHttpRequest();
  	xhttp.open("POST", "get_rate.php", false);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    	 rate_arr = JSON.parse(this.responseText);
    	}
  	};	
  	xhttp.send("qwe=" + currency);
});


/*function get_rate(){
	var xhttp = new XMLHttpRequest();
  	xhttp.open("POST", "get_rate.php", false);
  	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  	
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
    	 rate = this.responseText;   	 
    	}
  	};	
  	xhttp.send("qwe=" + currency);
};*/

//Валюта Страхової суми
document.getElementById("insCur").onchange = function() {
	currency = document.getElementById("insCur").value;
	document.getElementById("currency").innerHTML = " " + currency;
	countSPzag();
	
}

//Коригуючі коефіцієнти в залежності 
//від віку Застрахованих осіб:(K4)
document.getElementById("K4").onchange = function() {
	K4 = document.getElementById("K4").value;
	countSPzag();
}

//Страхова сума
document.getElementById("insSum").onchange = function() {
	insSum = document.getElementById("insSum").value;
	countSPzag();
}
//Коефіцієнти програми страхування (Кпр)
document.getElementById("Kpr").onchange = function() {
	Kpr = document.getElementById("Kpr").value;
	countSPzag();
}
//Коефіцієнти безумовної франшизи (Кфр)
document.getElementById("Kfr").onchange = function() {
	Kfr = document.getElementById("Kfr").value;
	countSPzag();
}
//Коефіцієнти території дії Договору страхування (Ктер)
document.getElementById("Kter").onchange = function() {
	Kter = document.getElementById("Kter").value;
	countSPzag();
}
//Дата початку договору
document.getElementById("dateStart").onchange = function() {
	dateStart = document.getElementById("dateStart").value;
	countSPzag();
}
//Дата кінця договору та кількість днів
document.getElementById("dateStop").onchange = function() {
	dateStop = document.getElementById("dateStop").value;
	var diff = new Date(dateStop) - new Date(dateStart);
	days = diff/1000/60/60/24 + 1;
	countSPzag();
}

//Базові страхові платежі з комплексного страхування під час перебуванням за
//кордоном (СПб)
function countSPb() {
	if (insSum == 30000) {
		if (flag == 1) {
			if (multi_visa_period == 1) {
				SPb = insurancePaymentForOneDay_muliTrip[1][0];
				document.getElementById("SPb").value = SPb;	
			}
			if (multi_visa_period == 2) {
				SPb = insurancePaymentForOneDay_muliTrip[1][1];
				document.getElementById("SPb").value = SPb;		
			}	
			if (multi_visa_period == 3) {
				SPb = insurancePaymentForOneDay_muliTrip[1][2];
				document.getElementById("SPb").value = SPb;	
			}
			if (multi_visa_period == 4) {
				SPb = insurancePaymentForOneDay_muliTrip[1][3];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 5) {
				SPb = insurancePaymentForOneDay_muliTrip[1][4];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 6) {
				SPb = insurancePaymentForOneDay_muliTrip[1][5];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 7) {
				SPb = insurancePaymentForOneDay_muliTrip[1][6];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 8) {
				SPb = insurancePaymentForOneDay_muliTrip[1][7];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 9) {
				SPb = insurancePaymentForOneDay_muliTrip[1][8];	
				document.getElementById("SPb").value = SPb;	
			}		
		}else{
			if (days < 8) {
				SPb = insurancePaymentForOneDay_oneTrip[2][0];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 8 && days < 16) {
				SPb = insurancePaymentForOneDay_oneTrip[2][1];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 15 && days < 31) {
				SPb = insurancePaymentForOneDay_oneTrip[2][2];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 30 && days < 91) {
				SPb = insurancePaymentForOneDay_oneTrip[2][3];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 90 && days < 181) {
				SPb = insurancePaymentForOneDay_oneTrip[2][4];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 180 && days < 367) {
				SPb = insurancePaymentForOneDay_oneTrip[2][5];
				document.getElementById("SPb").value = SPb;	
			}		
		}
	}else if (insSum == 15000) {
		if (flag == 1) {
			if (multi_visa_period == 1) {
				SPb = insurancePaymentForOneDay_muliTrip[0][0];
				document.getElementById("SPb").value = SPb;		
			}
			if (multi_visa_period == 2) {
				SPb = insurancePaymentForOneDay_muliTrip[0][1];
				document.getElementById("SPb").value = SPb;		
			}	
			if (multi_visa_period == 3) {
				SPb = insurancePaymentForOneDay_muliTrip[0][2];
				document.getElementById("SPb").value = SPb;	
			}
			if (multi_visa_period == 4) {
				SPb = insurancePaymentForOneDay_muliTrip[0][3];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 5) {
				SPb = insurancePaymentForOneDay_muliTrip[0][4];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 6) {
				SPb = insurancePaymentForOneDay_muliTrip[0][5];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 7) {
				SPb = insurancePaymentForOneDay_muliTrip[0][6];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 8) {
				SPb = insurancePaymentForOneDay_muliTrip[0][7];
				document.getElementById("SPb").value = SPb;	
			}	
			if (multi_visa_period == 9) {
				SPb = insurancePaymentForOneDay_muliTrip[0][8];
				document.getElementById("SPb").value = SPb;		
			}		
		}else {
			if (days < 8) {
				SPb = insurancePaymentForOneDay_oneTrip[1][0];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 8 && days < 16) {
				SPb = insurancePaymentForOneDay_oneTrip[1][1];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 15 && days < 31) {
				SPb = insurancePaymentForOneDay_oneTrip[1][2];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 30 && days < 91) {
				SPb = insurancePaymentForOneDay_oneTrip[1][3];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 90 && days < 181) {
				SPb = insurancePaymentForOneDay_oneTrip[1][4];
				document.getElementById("SPb").value = SPb;	
			}
			if (days > 180 && days < 367) {
				SPb = insurancePaymentForOneDay_oneTrip[1][5];
				document.getElementById("SPb").value = SPb;	
			}
		}	
	} else {
		if (days < 8) {
			SPb = insurancePaymentForOneDay_oneTrip[0][0];
			document.getElementById("SPb").value = SPb;	
		}
		if (days > 8 && days < 16) {
			SPb = insurancePaymentForOneDay_oneTrip[0][1];
			document.getElementById("SPb").value = SPb;	
		}
		if (days > 15 && days < 31) {
			SPb = insurancePaymentForOneDay_oneTrip[0][2];
			document.getElementById("SPb").value = SPb;	
		}
		if (days > 30 && days < 91) {
			SPb = insurancePaymentForOneDay_oneTrip[0][3];
			document.getElementById("SPb").value = SPb;	
		}
		if (days > 90 && days < 181) {
			SPb = insurancePaymentForOneDay_oneTrip[0][4];
			document.getElementById("SPb").value = SPb;	
		}
		if (days > 180 && days < 367) {
			SPb = insurancePaymentForOneDay_oneTrip[0][5];
			document.getElementById("SPb").value = SPb;	
		}
	}
}
//Базові страхові платежі з добровільного страхування від нещасних випадків(СПб)
function countSPb_accident() {	
	if (flag_acc == 0) {	
		if (days < 8) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[0];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (days > 8 && days < 16) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[1];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (days > 15 && days < 31) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[2];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (days > 30 && days < 91) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[3];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (days > 90 && days < 181) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[4];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (days > 180 && days < 367) {
			SPb_accident = insurancePaymentForOneDay_oneTrip_acc[5];
			document.getElementById("SPb_accident").value = SPb_accident;
		}	
	} else {
		if (multi_visa_period == 1) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[0];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 2) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[1];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 3) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[2];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 4) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[3];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 5) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[4];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 6) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[5];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 7) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[6];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 8) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[7];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
		if (multi_visa_period == 9) {
			SPb_accident = insurancePaymentForOneDay_muliTrip_acc[8];
			document.getElementById("SPb_accident").value = SPb_accident;
		}
	}	
}
//Мультивіза
/*Если поставить галку "Мультивіза":
1 - появляется select с выбором "Термін дії Договору/строк дії Договору";
2 - пропадает значение 10000 в select "Розмір страхової суми"(id="multi");
3 - устанавливается flag = 1, для пересчета коефициентов для мультивизы;
4 - Если убрать галку "Мультивіза", пропадает select с выбором "Термін дії Договору/строк дії Договору",
	устанавливается flag = 0, для пересчета коефициентов для одноразовой визы,
	появляется значение 10000 в select "Розмір страхової суми"(id="multi")
*/
document.getElementById("multi_visa").onclick = function() {
	if(this.checked){  		
		//1
   		document.getElementById("multi_visa_period_hidden").style.display = "block";
        //2
        document.getElementById("multi").disabled = true;
        if (document.getElementById("insSum").value == 10000) {
        	document.getElementById("insSum").value = insSum_selected;
        	insSum = insSum_selected;
        } 
        //3       	
        flag = 1;
          countSPzag();
          document.getElementById("multi_visa_period").onchange = function() {
          	multi_visa_period = document.getElementById("multi_visa_period").value;
			countSPzag();
          }
     //4
	}else{
        document.getElementById("multi_visa_period_hidden").style.display = "none";
        document.getElementById("multi").disabled = false;
		insSum = document.getElementById("insSum").value;
        flag = 0;
        countSPzag();
    }	
}

//Виконання небезпечної роботи
/*Если поставить галку "Виконання небезпечної роботи",
появляется select с выбором "Групи ризику в залежності від виду діяльності"
и идет пересчет согласно выбранному пункту,
а если убрать галку все значения возвращаются на значения по умолчанию 
и идет соответсвующий перерасчет
*/

document.getElementById("K1").onclick = function() {
	 if(this.checked){  		
   		document.getElementById("K1_hidden").style.display = "block";
   		document.getElementById("K1_activity").onchange = function() {
        	K1 = document.getElementById("K1_activity").value;
			countSPzag();
        }
	}else{
        document.getElementById("K1_hidden").style.display = "none";
        K1 = 1;
        countSPzag();	
    }	
}
//Непрофесійний спорт
/*Если поставить галку "Зайняття масовим непрофесійним спортом або звичайне зайняття активним відпочинком",
появляется select с выбором "Групи ризику в залежності від виду спорту"
и идет пересчет согласно выбранному пункту,
а если убрать галку все значения возвращаются на значения по умолчанию 
и идет соответсвующий перерасчет
*/
document.getElementById("K2").onclick = function() {
	 if(this.checked){  		
   		document.getElementById("K2_hidden").style.display = "block";
   		document.getElementById("K2_activity").onchange = function() {
        	K2 = document.getElementById("K2_activity").value;
			countSPzag();
        }
	}else{
        document.getElementById("K2_hidden").style.display = "none";
        K2 = 1;
        countSPzag();	
    }	
}
  //Професійний спорт
  /*Если поставить галку "Зайняття професійним спортом, а також масовим спортом на період проведення змагань",
появляется select с выбором "Групи ризику в залежності від виду спорту"
и идет пересчет согласно выбранному пункту,
а если убрать галку все значения возвращаются на значения по умолчанию 
и идет соответсвующий перерасчет
*/
document.getElementById("K3").onclick = function() {
	 if(this.checked){  		
   		document.getElementById("K3_hidden").style.display = "block";
   		document.getElementById("K3_activity").onchange = function() {
        	K3 = document.getElementById("K3_activity").value;
			countSPzag();
        }
	}else{
        document.getElementById("K3_hidden").style.display = "none";
        K3 = 1;
        countSPzag();	
    }	
}
//ДОБРОВІЛЬНЕ СТРАХУВАННЯ ВІД НЕЩАСНИХ ВИПАДКІВ
/*Если поставить галку "Добровільне страхування від нещасних випадків",
появляется select с выбором "Добровільне страхування від нещасних випадків"
и идет посчет согласно выбранному пункту и соответсвующей функции,
а если убрать галку все значения возвращаются на значения по умолчанию 
и идет соответсвующий перерасчет;
*/
document.getElementById("accident").onclick = function() {
	 if(this.checked){  		
   		document.getElementById("accident_hidden").style.display = "block";
   		flag_acc = 1;
        countSPzag();
   		document.getElementById("SSnv").onchange = function() {
        	SSnv = document.getElementById("SSnv").value;
			countSPzag();
        }
	}else{
        document.getElementById("accident_hidden").style.display = "none";
        flag_acc = 0;
        SSnv = 0;
        countSPzag();	
    }	
}
/*Страховий платіж (СПтр) з комплексного страхування під час 
перебуванням зкордоном відповідно до обраної Опції (програми страхування), грн*/
function countSPtr() {
	if (currency == "USD") {
		rate = rate_arr["USD"];
	}else{
		rate = rate_arr["EUR"];
	}
	countSPb();
	SPtr = SPb*days*Kpr*Kfr*Kter*K1*K2*K3*K4*K5*rate;
	//document.getElementById("SPtr").value = SPtr;

}
/*Страховий платіж (СПнв) з добровільного страхуванням від нещасних випадків, грн.*/
function countSPnv(){
	countSPb_accident();
	SPnv = SSnv*SPb_accident*K1*K2*K3*K4*K5;
	//document.getElementById("SPnv").value = SPnv;
}
//Розрахунок загального страхового платежу на 1 (одну) особу за Міжнародни
//договором добровільного комплексного страхування під час перебування за кордоном
function countSP() {
	countSPtr();
	countSPnv();
	SP = SPtr + SPnv;
	//document.getElementById("SP").value = SP;	
}
//Розрахунок загального страхового платежу за Міжнародним договоро//добровільного комплексного страхування під час перебування за кордоном
function countSPzag() {
	countSP();
	SPzag = SP*tourists;
	
	if (!SPzag) {
		document.getElementById("sum").innerHTML = "0,00 Грн.";
	}else{
		SPzag = SPzag.toFixed(2);
		document.getElementById("sum").innerHTML = SPzag + " Грн.";
		document.getElementById("SPzag").value = SPzag;
	}
	
}
//Кнопка для отображения формы личных данных
document.getElementById("continue").onclick = function() {
	document.getElementById("personal_data_hidden").style.display = "block";
}

//номер телефона
document.getElementById("tel").addEventListener("input", function (e) {
  var x = e.target.value.replace(/\D/g, "").match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : "(" + x[1] + ") " + x[2] + (x[3] ? "-" + x[3] : "");
});

//Имя
document.getElementById("name").onkeyup = function() {
	if (!regName.test(document.getElementById("name").value)) {
   	document.getElementById("name_error").innerHTML = "Дозволені тільки латинські літери";
   }else{
   	document.getElementById("name_error").innerHTML = "";
   }
}

//Фамилия
document.getElementById("surname").onkeyup = function() {
	if (!regName.test(document.getElementById("surname").value)) {
   	document.getElementById("surname_error").innerHTML = "Дозволені тільки латинські літери";
   }else{
   	document.getElementById("surname_error").innerHTML = "";
   }
}

//Серия паспорта
document.getElementById("pass_series").onkeyup = function() {
	if (!regpass_series.test(document.getElementById("pass_series").value)) {
   	document.getElementById("pass_series_error").innerHTML = "Дві великы латинські літери";
   }else{
   	document.getElementById("pass_series_error").innerHTML = "";
   }
}
//Номер паспорта
document.getElementById("pass_num").onkeyup = function() {
	if (!regpass_num.test(document.getElementById("pass_num").value)) {
   	document.getElementById("pass_num_error").innerHTML = "Шість цифр";
   }else{
   	document.getElementById("pass_num_error").innerHTML = "";
   }
}




