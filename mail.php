<?php 
if (isset($_POST['SSnv'])) {
	$SSnv = $_POST['SSnv'];
}else{
	$SSnv = "--------";
}
switch ($SSnv) {
	case 1:
		$Kpr_name = "А (Standart)";
		break;
	case 1.38:
		$Kpr_name = "В (Business)";
		break;
	case 1.9:
		$Kpr_name = "С (Comfort)";
		break;
	case 3:
		$Kpr_name = "E (Elite)";
		break;
}

if (isset($_POST['SPb_accident'])) {
	$SPb_accident = $_POST['SPb_accident'];
}

if (isset($_POST['K1'])) {
	$K1 = $_POST['K1'];
}

if (isset($_POST['K2'])) {
	$K2 = $_POST['K2'];
}

if (isset($_POST['K3'])) {
	$K3 = $_POST['K3'];
}
$K4 = $_POST['K4']; 

//$SPtr = $_POST['SPtr'];
//$SPnv = $_POST['SPnv'];
//$SP = $_POST['SP'];
$SPzag = $_POST['SPzag'];

$Kter = $_POST['Kter'];
$Kfr = $_POST['Kfr'];
$Kpr = $_POST['Kpr'];
$insSum = $_POST['insSum'];
$insCur = $_POST['insCur'];
$tourists = $_POST['tourists'];

$current_date = date("Y-m-d");

$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$tel = $_POST['tel'];
$birth_date = $_POST['date'];
$pass_series = $_POST['pass_series'];
$pass_num = $_POST['pass_num'];

$dateStart = $_POST['dateStart'];
$dateStop = $_POST['dateStop'];
$days = abs(strtotime($_POST['dateStart'])-strtotime($_POST['dateStop']))/60/60/24+1;

if ($Kter == 1) {
	$Kter_name = "EUROPE";
}elseif ($Kter == 1.5) {
	$Kter_name = "WORLDWIDE";
}else{
	$Kter_name = "WORLDWIDE*";
}

switch ($Kfr) {
	case 1:
		$Kfr_name = 0;
		break;
	case 0.95:
		$Kfr_name = 50;
		break;
	case 0.85:
		$Kfr_name = 100;
		break;
	case 0.8:
		$Kfr_name = 150;
		break;
	case 0.75:
		$Kfr_name = 200;
		break;
	case 0.7:
		$Kfr_name = 250;
		break;
}

switch ($Kpr) {
	case 1:
		$Kpr_name = "А (Standart)";
		break;
	case 1.38:
		$Kpr_name = "В (Business)";
		break;
	case 1.9:
		$Kpr_name = "С (Comfort)";
		break;
	case 3:
		$Kpr_name = "E (Elite)";
		break;
}

$text = "<html>
			<head>
  				<style>
  					table, tr, td {
  						border: 1px solid black;
  						border-collapse: collapse;
  					}
  				</style>
			</head>
			<body>
			  <table>
			    <tr>
                	<td>Тривалість(днів)<br>/Duration(days)</td>
                	<td>".$days."</td>
                	<td>Знижки/надбавки(%)<br>Discount/increase(%)</td>
                	<td></td>
                	<td>Франшиза(у.о.)/<br>Deductible(c.u.)</td>
                	<td>".$Kfr_name." ".$insCur."</td>
                	<td>Територія дії/<br> Territory of coverage</td>
                	<td>".$Kter_name."</td>
                	<td> Опція(програма страхування)/<br> Type of coverage</td>
                	<td>".$Kpr_name."</td>
			    </tr>
			    <tr>

					<td>Строк дії Договору(днів):<br>Period of insurance(days):</td>
					<td>".$days."</td>
					<td>з/<br>from</td>
					<td>".$dateStart."</td>
					<td>до/<br>to</td>
					<td>".$dateStop."</td>
					<td colspan='2'>Умови страхування в Додатку 2 до Договору/<br>Conditions in Appendix 2 to the Policy</td>
					<td>УМОВИ І/<br>Conditions I</td>
					<td>УМОВИ ІІ/<br>Conditions II</td>
			    </tr>
			    <tr>
					<td>Страховик/<br>Insurer</td>
					<td colspan='5'>ПРИВАТНЕ АКЦІОНЕРНЕ ТОВАРИСТВО 'СТРАХОВА КОМПАНІЯ 'ЄВРОІНС УКРАЇНА'/<br>PRIVATE JOINT STOCK COMPANY 'EUROINS UKRAINE INSURANCE COMPANY'</td>
					<td colspan='2'>Страхова сума на кожну Застрах.особу<br>Sum insured per Insured person</td>
					<td>".$insSum." ".$insCur."</td>
					<td>".$SSnv."Грн.</td>
			    </tr>
			    <tr>
					<td>Адреса Страховика/<br>Adress of the Insurer</td>
					<td colspan='5'>Україна, 03150, м. Київ, вул. Велика Васильківська, 102/<br>102, Velyka Vasyl'kivs'ka Str., Kyiv, 03150, Ukraine</td>
					<td colspan='2'>Страховий тариф/<br>Insurance rate</td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td rowspan='2'>Телефон Страховика/<br>Telephone of the Insurer</td>
					<td rowspan='2' colspan='2'>тел./tel. +38(044)247-44-77<br>fax/факс +38(044)529-08-94</td>
					<td rowspan='2' colspan='2'>Адреса/<br>Address</td>
					<td rowspan='2'>ІНПП/<br>Identification code</td>
					<td rowspan='2'>Паспорт/<br>Passport</td>
					<td rowspan='2'>Дата народження/<br>Date of birth</td>
					<td colspan='2'>
						Страховий платіж(грн.)/Insurance premium(UAH)
						<tr>
							<td>УМОВИ І / Conditions I</td>
							<td>УМОВИ ІІ/ Conditions IІ</td>
						</tr>	
					</td>
			    </tr>
			    <tr>
					<td>Страхувальник/<br>Insured</td>
					<td colspan='2'></td>
					<td colspan='2'></td>
					<td>-----------</td>
					<td>-----------</td>
					<td>-----------</td>
					<td>-----------</td>
					<td>-----------</td>
			    </tr>
			    <tr>
					<td>Застрахована особа 1/<br>Insured Person 1</td>
					<td colspan='2'>".$surname." ".$name."</td>
					<td colspan='2'></td>
					<td></td>
					<td>".$pass_series."".$pass_num."</td>
					<td>".$birth_date."</td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td>Застрахована особа 2/<br>Insured Person 2</td>
					<td colspan='2'></td>
					<td colspan='2'></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td>Застрахована особа 3/<br>Insured Person 3</td>
					<td colspan='2'></td>
					<td colspan='2'></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td>Застрахована особа 4/<br>Insured Person 4</td>
					<td colspan='2'></td>
					<td colspan='2'></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td>Особливі умови/<br>Special conditions</td>
					<td colspan='4'></td>
					<td colspan='3'>Страховий платіж за Умовами І та ІІ (грн.)/Insurance premium under Conditions I and II (UAH)<br></td>
					<td></td>
					<td></td>
			    </tr>
			    <tr>
					<td colspan='5'> При страхуванні групи додається список Застрахованих осіб, який є невід'ємною частиною цього Договору/<br> If the group is insured the lists of Insured persons is enclosed and is an integral part of this Policy.</td>
					<td colspan='3'>Загальна страховий платіж за Договором(грн.)/<br>Total insurance premium under this  Policy (UAH)</td>
					<td colspan='2'></td>
			    </tr>
			    <tr>
				    <td colspan='10'>Умови комплексного добровільного страхування під час перебування за кордоном (УМОВИ І) та умови добровільного страхування від нещасних випадків (УМОВИ ІІ) наведені у Додатку 1 та Додатку 2 до цього<br>Conditions of  Policy on voluntary complex insurance while staying abroad (Conditions I) and Voluntary accident insurance conditions (Conditions II) are listed in Appendix 1 and Appendix 2 to this  Policy.
				    </td>
			    </tr>
			    <tr>
					<td rowspan='2' colspan='5'>Підпис Страхувальника/Signature of the Insured<br>З Правилами страхування ознайомлений, з умовами згодний. Згоду Застрахованої особи на страхування отримав.<br>Has been familiarized with the Rules of insurance terms of insurance.The Insured received consent of the Insured person for insurance<br>М.П./Seal
					</td>
					<td rowspan='2' colspan='3'>Підпис Страховика(Агента)/Signature of the Insurer(Agent)<br>М.П./Seal
					</td>
						<td>Дата укладання Договору/<br>Date of the  Policy conclusion</td>
						<td>Сплатити страховий платіж до/<br>Insurance premium shall be paid till</td>
						<tr>
							<td>".$current_date."</td>
							<td>".$current_date."</td>
						</tr>
				</tr>
			    <tr>
			    	<td colspan='10'>* у. о. - грошовий еквівалент ліміту відповідальності Страховика перед Страхувальником (Застрахованою особою) у відношенні до грошової одиниці України<br> 
 					* standard unit - currency equivalent of the liability limit of the Insurer against the Insured (the Insured person) in relation to the Ukrainian currrency unit<br>
 					Страховий захист надається відповідно 'Рішення Ради ЄС 2004/17/EG щодо медичного страхування подорожуючих осіб'/<br>
 					Insurance coverage is provided acording to 'Resolution of the EU Council 2004/17/EG regarding medical insurance of persons who are traveling'
 					</td>
			    </tr>
			  </table>
			</body>
			</html>";
//mail("anton.petrov0@gmail.com", "qwerty", "qwerty");
echo ($text);
?>