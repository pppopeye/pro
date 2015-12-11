
function checkform()
{
submitResult = false;

M_fname = document.getElementById('txtUsername');
ePassword = document.getElementById('txtPassword');
eConfirm = document.getElementById('txtConfirm');
select7 = document.getElementById('select7');
textfield = document.getElementById('textfield');
eEmail = document.getElementById('txtEmail');
date = document.getElementById('date');
select2 = document.getElementById('select2');
select3 = document.getElementById('select3');
select4 = document.getElementById('select4');
select6 = document.getElementById('select6');
ePhone = document.getElementById('txtPhone');
textfield2 = document.getElementById('textfield2');

if((eUsername.value != '') && (ePassword.value != ''))
{
submitResult = true;
if(submitResult && (eUsername.value.length < 6))
{
submitResult = false;
alert('กรุณากรอก Username อย่างน้อย 6 หลัก');
}
if(submitResult && !eUsername.value.match(/^[\wก-ฮะ-์]+$/))
{
submitResult = false;
alert('กรุณากรอก Username ด้วยตัวเลขหรือตัวอักษรเท่านั้น\nไม่มีการเว้นวรรค และใช้เครื่องหมายใดๆ');
}
if(submitResult && !ePassword.value.match(/^[\wก-ฮะ-์]+$/))
{
submitResult = false;
alert('กรุณากรอก Password ด้วยตัวเลขหรือตัวอักษรเท่านั้น\nไม่มีการเว้นวรรค และใช้เครื่องหมายใดๆ');
}
if(submitResult && (ePassword.value != eConfirm.value))
{
submitResult = false;
alert('กรุณายืนยัน Password ให้ถูกต้องตรงกัน');
}
if(submitResult && (select7.value == ""))
{
submitResult = false;
alert('กรุณาระบุรุ่นรถยนต์ที่ต้องการทดลองขับ');
}
if(submitResult && (textfield.value == ""))
{
submitResult = false;
alert('กรุณาระบุชื่อ และนามสกุล');
}
if(submitResult && (textfield2.value == ""))
{
submitResult = false;
alert('กรุณาระบุเบอร์โทรศัพท์');
}
if(submitResult && (textfield2.value.length > 0) && (textfield2.value.length < 10))
{
submitResult = false;
alert('กรุณากรอกเบอร์โทรศัพท์มือถือให้ครบ 10 หลัก');
}
if(submitResult && (textfield2.value.substring(0,2) != "08"))
{
submitResult = false;
alert('เบอร์โทรศัพท์ของคุณรูปแบบไม่ถูกต้อง กรุณาขึ้นต้นด้วย "08" เช่น 081 หรือ 0812345678');
}
if(submitResult && (select4.value == ""))
{
submitResult = false;
alert('กรุณาระบุเวลาที่ต้องการทดลองขับ');
}
if(submitResult && (date.value == ""))
{
submitResult = false;
alert('กรุณาระบุวันที่');

}
if(submitResult && (select2.value == ""))
{
submitResult = false;
alert('กรุณาระบุเดือน');
}
if(submitResult && (select3.value == ""))
{
submitResult = false;
alert('กรุณาระบุปี');
}

if(submitResult && (select6.value == ""))
{
submitResult = false;
alert('กรุณาระบุพื้นที่ต้องการทดลองขับ');
}
if(submitResult && (eEmail.value.length == 0) && (ePhone.value.length == 0) && (textfield2.value.length == 0))
{
submitResult = false;
alert('กรุณากรอก E-mail หรือ กรอกเบอร์โทรศัพท์ในกรณีที่ไม่มี E-mail ');
}
if(submitResult && (eEmail.value.length > 0) && !eEmail.value.match(/^[\w][\w\-\.]*\@[\w][\w\-]*(\.[\w][\w\-]*)+([\s,]+[\w][\w\-\.]*\@[\w][\w\-]*(\.[\w][\w\-]*)+)?$/))
{
submitResult = false;
alert('กรุณากรอก Email ให้ถูกต้อง');
}
if(submitResult && (eEmail.value.length > 0) && eEmail.value.match(/@example\.com/))
{
submitResult = false;
alert('e-mail ที่ท่านแจ้งไม่ถูกต้อง\nเนื่องจาก @example.com เป็น e-mail ตัวอย่าง ไม่มีอยู่จริง\nหากท่านไม่มี e-mail ไม่จำเป็นต้องกรอกข้อความในส่วนนี้');
}ห
if(submitResult && (eEmail.value.length > 0) && eEmail.value.match(/@example\.co.th/))
{
submitResult = false;
alert('e-mail ที่ท่านแจ้งไม่ถูกต้อง\nเนื่องจาก @example.co.th เป็น e-mail ตัวอย่าง\nหากท่านไม่มี e-mail ไม่จำเป็นต้องกรอกข้อความในส่วนนี้');
}
if(submitResult && (eEmail.value.length > 0) && eEmail.value.match(/^www/))
{
if(!confirm('โดยปรกติ E-mail จะไม่นำหน้าด้วย www\nยืนยัน E-mail "' + eEmail.value + '" หรือไม่?'))
submitResult = false;
}
}
else
{
alert('กรุณากรอก Username และ Password');
}

if(submitResult)
{
alert('ผ่านการตรวจสอบ');
submitResult = false;
}

return submitResult;
}
