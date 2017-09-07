<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
.column{
	display: inline-block;
}
</style>
<div class="container">
	<div id="insuranceCalculator">
	<div id="demo"></div>
		<div class="input">
		<form action="mail.php" method="post">
			<label for="Kter">Територія дії</label>
			<select id="Kter" name="Kter" required>
				<option value="1">
					ЄВРОПА окрім України та країни постійного проживання.
				</option>
				<option value="1.5">
					ВЕСЬ СВІТ за виключенням країн: Північної та Південної Америки, Африки, Азії, Австралії та Океанії та крім України та країни постійного проживання.
				</option>
				<option value="2.3">
					ВЕСЬ СВІТ* включаючи країни: Північної та Південної Америки, Африки, Азії, Австралії та Океанії, але окрім України та країни постійного проживання.
				</option>
			</select>
			<br><br>
			<label for="tourists">
				Кількість застрахованих осіб
			</label>
			<input id="tourists" name="tourists" type="number" value="1" required>
			<br><br>
			
			<div>
				<div class="column">
				Вік Застрахованої особи<br>
					<select id="K4" name="K4">
						<option value="1" selected>Виберіть вік застрахованої 	особи</option>
						<option value="1.5">від 1 року до 3 років</option>
						<option value="1.5">від 60 до 65 років</option>
						<option value="2">від 66 до 75 років</option>
					</select>
				</div>
				<div class="column" id="K4_2_div" style="display:none">
				Вік 2-ї застрахованої особи<br>
					<select id="K4_2" name="K4_2" >
						<option value="1" selected>Виберіть вік застрахованої 	особи</option>
						<option value="1.5">від 1 року до 3 років</option>
						<option value="1.5">від 60 до 65 років</option>
						<option value="2">від 66 до 75 років</option>
					</select>
				</div>
				<div class="column" id="K4_3_div" style="display:none">
				Вік 3-ї застрахованої особи<br>
					<select id="K4_3" name="K4_3">
						<option value="1" selected>Виберіть вік застрахованої 	особи</option>
						<option value="1.5">від 1 року до 3 років</option>
						<option value="1.5">від 60 до 65 років</option>
						<option value="2">від 66 до 75 років</option>
					</select>
				</div>
				<div class="column" id="K4_4_div" style="display:none">
				Вік 4-ї застрахованої особи<br>
					<select id="K4_4" name="K4_4">
						<option value="1" selected>Виберіть вік застрахованої 	особи</option>
						<option value="1.5">від 1 року до 3 років</option>
						<option value="1.5">від 60 до 65 років</option>
						<option value="2">від 66 до 75 років</option>
					</select>
				</div>
			</div>			
			<br><br>
			<label for="dateStart">Початок дії договору</label>	
			<input type="date" id="dateStart" name="dateStart" required>
			
			<label for="dateStop">Дата кінця дії договору</label>	
			<input type="date" id="dateStop" name="dateStop" required>
			<br><br>
			<label for="Kpr">
				Програма страхування
			</label>
			<select id="Kpr" name="Kpr" required>
				<option value="1">А (Standart)</option>
				<option value="1.38">В (Business)</option>
				<option value="1.9">С (Comfort)</option>
				<option value="3">E (Elite)</option>
			</select>
			<br><br>
			<label for="insSum">
				Розмір страхової суми
			</label>
			<select id="insSum" name="insSum" required>
				<option value="10000" id="multi">10 000</option>
				<option value="15000">15 000</option>
				<option value="30000" selected>30 000</option>
			</select>
			<label for="insCur">
				Валюта страхової суми
			</label>
			<select id="insCur" name="insCur" required>
				<option value="USD">USD</option>
				<option value="EUR">EUR</option>	
			</select>
			<br><br>
			<label for="Kfr">
				Розмір безумовної франшизи
			</label>
			<select id="Kfr" name="Kfr" required>
				<option value="1">0</option>
				<option value="0.95">50</option>
				<option value="0.85">100</option>
				<option value="0.8">150</option>
				<option value="0.75">200</option>
				<option value="0.7">250</option>
			</select><span id="currency"></span>
			<br>
		
			<input type="checkbox" id="multi_visa" name="multi_visa">
			<label for="multi_visa">Мультивіза</label>
			<!--Появляется после галочки id="multi_visa"-->
			<div id="multi_visa_period_hidden" style="display:none">
			<label for="multi_visa_period">
				Термін дії Договору/строк дії Договору
			</label>
			<select id="multi_visa_period" name="multi_visa_period" required>
					<option value="1">15/30</option>
					<option value="2">15/90</option>
					<option value="3">30/90</option>
					<option value="4">60/180</option>
					<option value="5">90/180</option>
					<option value="6">30/365</option>
					<option value="7">60/365</option>
					<option value="8">90/365</option>
					<option value="9">180/365</option>
			</select>
			</div>
			<br>
			<fieldset style="display: inline;">		
				<input type="checkbox" id="K1" name="K1">
				<label for="K1">
					Виконання небезпечної роботи
				</label>
				<!--Появляется после галочки id="K1"-->
				<div id="K1_hidden" hidden>
					<label for="activity">
						Групи ризику в залежності від виду діяльності
					</label>
					<select id="K1_activity" name="K1_activity" required>
						<option disabled selected>Виберіть елемент із списку</option>
						<option value="2.5">Особи, праця яких пов’язана з особливим (підвищеним) ризиком</option>
						<option value="1.5">Категорії працюючих безпосередньо зайнятi в процесі виробництва</option>
						<option value="1">Категорії громадян, що безпосередньо не зайнятi у процесі виробництва</option>
					</select>
				</div>
				<br>
				<input type="checkbox" id="K2" name="K2">
				<label for="K2">
					Зайняття масовим непрофесійним спортом або звичайне зайняття активним відпочинком
				</label>
				<!--Появляется после галочки id="K2"-->
				<div id="K2_hidden" hidden>
					<label for="K2_activity">
						Групи ризику в залежності від виду спорту
					</label>
					<select id="K2_activity" name="K2_activity" required>
						<option disabled selected>Виберіть елемент із списку</option>
						<option value="1">Подорожі (походи піші) - із спокійним ландшафтом, шахи, шашки, більярд, спортивний бридж, радіоспорт, а також види спорту з аналогічними фізичними навантаженнями, тощо</option>
						<option value="1.1">Аеробіка, бадмінтон, біатлон, буєрний спорт, вітрильний спорт, волейбол, гімнастика художня, лижні гонки, орієнтувальний спорт, плавання, перетягування канату, тренування в тренажерних залах, фітнес, шейпінг, спортивні танці; спортивна аеробіка; акробатичний рок-н-рол настільний теніс, тощо</option>
						<option value="1.3">Акробатика, армспорт, бейсбол, єдиноборства, велоспорт, веслування, вінсерфінг, водне поло, водні лижі, гандбол, гирьовий спорт, лижне двоборство, легка атлетика, пауерліфтінт, планерний спорт, пейнтбол, пожежно-прикладний спорт, стрибки на батуті, стрибки у воду, стрільба, триатлон, теніс (крім настільного), фехтування, фігурне катання, футбол, подорожі (походи піші) – із гірським ландшафтом, тощо</option>
						<option value="2">Автомобільний спорт, альпінізм, багатоборство, баскетбол, бобслей, бокс, дайвінг, важка атлетика, гімнастика спортивна, гірськолижний спорт, дельтапланеризм, кінний спорт, картинт, карате, ковзанярський спорт, літаковий спорт, мотобол, мотоциклетний спорт, парашутний спорт, підводний спорт, планерний спорт, поло, ралі, регбі, санний спорт, скелелазіння, стрибки на лижах із трампліну, сноуборд, спідвей, хокей, фрістайл, тощо</option>
						<option value="1.15">Активний відпочинок</option>
					</select>
				</div>
				<br>
				<input type="checkbox" id="K3" name="K3">
				<label for="K3">
					Зайняття професійним спортом, а також масовим спортом на період проведення змагань
				</label>
				<!--Появляется после галочки id="K3"-->
				<div id="K3_hidden" hidden>
					<label for="K3_activity">
						Групи ризику в залежності від виду спорту
					</label>
					<select id="K3_activity" name="K3_activity" required>
						<option disabled selected>Виберіть елемент із списку</option>
						<option value="1">Подорожі (походи піші) - із спокійним ландшафтом, шахи, шашки, більярд, спортивний бридж, радіоспорт, а також види спорту з аналогічними фізичними навантаженнями, тощо</option>
						<option value="2">Аеробіка, бадмінтон, біатлон, буєрний спорт, вітрильний спорт, волейбол, гімнастика художня, лижні гонки, орієнтувальний спорт, плавання, перетягування канату, тренування в тренажерних залах, фітнес, шейпінг, спортивні танці; спортивна аеробіка; акробатичний рок-н-рол настільний теніс, тощо</option>
						<option value="3">Акробатика, армспорт, бейсбол, єдиноборства, велоспорт, веслування, вінсерфінг, водне поло, водні лижі, гандбол, гирьовий спорт, лижне двоборство, легка атлетика, пауерліфтінт, планерний спорт, пейнтбол, пожежно-прикладний спорт, стрибки на батуті, стрибки у воду, стрільба, триатлон, теніс (крім настільного), фехтування, фігурне катання, футбол, подорожі (походи піші) – із гірським ландшафтом, тощо</option>
						<option value="3">Автомобільний спорт, альпінізм, багатоборство, баскетбол, бобслей, бокс, дайвінг, важка атлетика, гімнастика спортивна, гірськолижний спорт, дельтапланеризм, кінний спорт, картинт, карате, ковзанярський спорт, літаковий спорт, мотобол, мотоциклетний спорт, парашутний спорт, підводний спорт, планерний спорт, поло, ралі, регбі, санний спорт, скелелазіння, стрибки на лижах із трампліну, сноуборд, спідвей, хокей, фрістайл, тощо</option>
					</select>
				</div><br>
				<input type="checkbox" id="accident" name="accident">
				<label for="accident">
					Добровільне страхування від нещасних випадків
				</label>
				<!--Появляется после галочки id="accident"-->
				<div id="accident_hidden" hidden>
					<label for="SSnv">
						Добровільне страхування від нещасних випадків
					</label>
					<select id="SSnv" name="SSnv" required>
						<option disabled selected value="0">Виберіть елемент із списку</option>
						<option value="5000" id="default">5 000</option>
						<option value="10000">10 000</option>
						<option value="20000">20 000</option>
					</select><span> Грн.</span>
				</div>
			</fieldset><br><br>

			<input type="text" id="SPb" name="SPb" hidden>
			<input type="text" id="SPb_accident" name="SPb_accident" hidden>
			<input type="text" id="SPtr" name="SPtr" hidden>
			<input type="text" id="SP" name="SP" hidden>
			<input type="text" id="SPzag" name="SPzag" hidden>


			<an>Загальна сума:</span>
			<!--Выводит общую сумму полиса-->
			<div id="sum">0,00 Грн.</div>
			<span>Грн.</span><br>
			<button id="continue">Продовжити</button><br><br>
			<!--Появляется после нажатия кнопки id="accident"-->
			<div class="container" id="personal_data_hidden" hidden>
				<div id="personal_data">
					<div class ="input">
						<form action="">
						<label for="email">Email <span>*</span></label>
							<input type="email" id="email" name="email" placeholder="Введіть ваш email" required><br>
							<label for="tel">Тел.<span>*</span></label>
							<input type="text" name="tel" id="tel" placeholder="(___)___-____" required><br>
							<label for="name">Ім'я<span>*</span></label>
							<input type="text" id="name" name="name" placeholder="Введіть ім'я на англійській мові" required><span id="name_error"></span><br>
							<label for="surname">Прізвище<span>*</span></label>
							<input type="text" id="surname" name="surname" placeholder="Введіть прізвище на англійській мові" required><span id="surname_error"></span><br>
							<label for="date">Дата народження</label>	
							<input type="date" id="date" name="date" required><br>

							<label for="pass_series">Серія паспорта<span>*</span></label>
							<input type="text" id="pass_series" name="pass_series" placeholder="Введіть серію паспорта" required><span id="pass_series_error"></span><br>
							<label for="pass_num">Номер паспорта<span>*</span></label>
							<input type="text" id="pass_num" name="pass_num" placeholder="Введіть номер паспорта" required><span id="pass_num_error"></span><br><br>
							<input type="submit" value="Submit"/>
						</form>
					</div>
				</div>
			</div>
		</form>	
		</div>
	</div>
</div>
<script src="InsuranceCalculatorJS.js"></script>