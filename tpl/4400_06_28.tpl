Q: list department number followed by the max,min,ave salary for each department.
	select Dno, MAX(salary),Min(salary),ave(salary) from employee groupby Dno

Q: 


How Many tickets?
<br/>
Adult: <input type="number" name="adult" onkeypress="return isNumberKey(event);" onkeyup="calPrice(this.value);"> &nbsp <span>*12</span>
</br>
Child: <input type="number" name="child" onkeypress="return isNumberKey(event);">
</br>
Senior: <input type="number" name="senior" onkeypress="return isNumberKey(event);">
</br></br>
