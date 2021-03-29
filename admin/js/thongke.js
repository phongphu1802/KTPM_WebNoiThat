function xulysubmit()
{
	var type = document.getElementById("idtypes");
	var datefrom = document.getElementById("from");
	var dateto = document.getElementById("to");
	if(type.value=="")
	{
		alert('Chưa chọn loại sản phẩm');
		type.focus();
		return false;
	}
	if(datefrom.value=="")
	{
		alert('Bạn chưa chọn ngày');
		datefrom.focus();
		return false;
	}
	if(dateto.value=="")
	{
		alert('Bạn chưa chọn ngày');
		dateto.focus();
		return false;
	}
	if(Date.parse(dateto.value) < Date.parse(datefrom.value))
	{
		alert('Bạn chọn ngày không hợp lệ, vui lòng chọn lại');
		datefrom.focus();
		return false;
	}

	return true;	
}
function xulysubmit1()
{
	var datefrom1 = document.getElementById("from1");
	var dateto1 = document.getElementById("to1");
	if(datefrom1.value=="")
	{
		alert('Bạn chưa chọn ngày');
		datefrom1.focus();
		return false;
	}
	if(dateto1.value=="")
	{
		alert('Bạn chưa chọn ngày');
		dateto1.focus();
		return false;
	}
	if(Date.parse(dateto1.value) < Date.parse(datefrom1.value))
	{
		alert('Bạn chọn ngày không hợp lệ, vui lòng chọn lại');
		datefrom1.focus();
		return false;
	}

	return true;
}
function xulysubmit2()
{
	var datefrom2 = document.getElementById("from2");
	var dateto2 = document.getElementById("to2");
	if(datefrom2.value=="")
	{
		alert('Bạn chưa chọn ngày');
		datefrom2.focus();
		return false;
	}
	if(dateto2.value=="")
	{
		alert('Bạn chưa chọn ngày');
		dateto2.focus();
		return false;
	}
	if(Date.parse(dateto2.value) < Date.parse(datefrom2.value))
	{
		alert('Bạn chọn ngày không hợp lệ, vui lòng chọn lại');
		datefrom2.focus();
		return false;
	}
	return true;
}