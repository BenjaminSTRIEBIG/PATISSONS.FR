var date={}
date.set={}
date.defaultValues={}
date.defaultValues.ymi=1800
date.defaultValues.yma=2200
date.attributes={}
date.attributes.npd="no-past-date"
date.attributes.nfd="no-future-date"
date.attributes.dd="date-day"
date.attributes.dm="date-month"
date.attributes.dy="date-year"
date.attributes.ymi="year-min"
date.attributes.yma="year-max"
date.attributes.def="default"
date.attributes.ml="month-language"
date.getDpm=function(){
	return([31,28,31,30,31,30,31,31,30,31,30,31])
}
date.setlistid=[]
date.listOfSelect=function(){
	var qs=document.querySelectorAll("select")
	date.days=[]
	date.months=[]
	date.years=[]
	var i=0
	while(i<qs.length){
		if(qs[i].hasAttribute(date.attributes.dd)){
			date.days.push(qs[i])
		}
		else if(qs[i].hasAttribute(date.attributes.dm)){
			date.months.push(qs[i])
		}
		else if(qs[i].hasAttribute(date.attributes.dy)){
			date.years.push(qs[i])
		}
		i++
	}
}
date.language={}
date.language["fr"]=["Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"]
date.language["en"]=["January","February","March","April","May","June","July","August","September","October","November","December"]
date.language["es"]=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]
date.language["it"]=["Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno","Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre"]
date.language["ge"]=["","","","","","","","","","","",""]
date.init=function(){
	date.listOfSelect()
	var years=date.years
	var i=0
	var today=new Date()
	while(i<years.length){
		var daypermonth=date.getDpm()
		j=0
		if(!date.isset(years[i].getAttribute(date.attributes.dy))){
			year=years[i]
			if(years[i].hasAttribute(date.attributes.ymi)){
				var amin=years[i].getAttribute(date.attributes.ymi)
			}
			else{
				var amin=date.defaultValues.ymi
			}
			if(years[i].hasAttribute(date.attributes.def)){
				var dvalue=years[i].getAttribute(date.attributes.def)
			}
			else{
				var dvalue=today.getFullYear()
			}
			if(years[i].hasAttribute(date.attributes.yma)){
				var amax=years[i].getAttribute(date.attributes.yma)
			}
			else{
				var amax=date.defaultValues.yma
			}
			var id=years[i].getAttribute(date.attributes.dy)
			date.set[id]={}
			var month=date.searchMonthSelect(id)
			var day=date.searchDaySelect(id)
			var nrt=false
			var nfd=false
			if((year.hasAttribute(date.attributes.npd))||(month.hasAttribute(date.attributes.npd))||(day.hasAttribute(date.attributes.npd))){
				var nrt=true
				amin=dvalue
				date.set[id].mode="p"
			}
			else if((year.hasAttribute(date.attributes.nfd))||(month.hasAttribute(date.attributes.nfd))||(day.hasAttribute(date.attributes.nfd))){
				var nfd=true
				amax=dvalue
				date.set[id].mode="f"
			}
			else{
				date.set[id].mode="d"
			}
			j=amin
			var yvalue=dvalue
			var htmly=""
			while(j<=amax){
				if(j==dvalue){
					htmly+="<option value='"+j+"' selected>"+j+"</option>"
				}
				else{
					htmly+="<option value='"+j+"'>"+j+"</option>"
				}
				j++
			}
			date.set[id].year=years[i]
			date.set[id].month=month
			date.set[id].day=day
			var fonction=function(set){
				date.set[id].onChange=function(){
					var daypermonth=date.getDpm()
					var year=set.year.value
					var day=set.day.value
					var month=set.month.value
					if((set.day.hasAttribute(date.attributes.npd))||(set.month.hasAttribute(date.attributes.npd))||(set.year.hasAttribute(date.attributes.npd))){
						var htmlj=""
						var htmlm=""
						if(set.mode!="p"){
							if(year<set.defaultYear){
								year=set.defaultYear
							}
							if(set.year.hasAttribute(date.attributes.yma)){
								var max=set.year.getAttribute(date.attributes.yma)
							}
							else{
								var max=date.defaultValues.yma
							}
							var i=set.defaultYear
							var htmly=""
							while(i<=max){
								if(i==year){
									var checked=" selected"
								}
								else{
									var checked=""
								}
								htmly+="<option value='"+i+"'"+checked+">"+i+"</option>"
								i++
							}
							set.year.innerHTML=htmly
						}
						set.mode="p"
						if(year==set.defaultYear){
							var dy=true
							if(month<set.defaultMonth){
								month=set.defaultMonth
							}
							if(set.month.hasAttribute(date.attributes.ml)){
								var i=set.defaultMonth
								var language=set.month.getAttribute(date.attributes.ml)
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+date.language[language][i-1]+"</option>"
									i++
								}
							}
							else{
								var i=set.defaultMonth
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+i+"</option>"
									i++
								}
							}
						}
						else{
							var dy=false
							if(set.month.hasAttribute(date.attributes.ml)){
								var i=1
								var language=set.month.getAttribute(date.attributes.ml)
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+date.language[language][i-1]+"</option>"
									i++
								}
							}
							else{
								var i=1
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+i+"</option>"
									i++
								}
							}
						}
						if((dy)&&(month==set.defaultMonth)){
							i=set.defaultDay
						}
						else{
							i=1
						}
						if(date.isbissextile(year)){
							daypermonth[1]++
						}
						var nbday=daypermonth[month-1]
						if(nbday<day){
							day=nbday
						}
						while(i<=nbday){
							if(i==day){
								var checked=" selected"
							}
							else{
								var checked=""
							}
							htmlj+="<option value='"+i+"'"+checked+">"+i+"</option>"
							i++
						}
						set.day.innerHTML=htmlj
						set.month.innerHTML=htmlm
					}
					else if((set.day.hasAttribute(date.attributes.nfd))||(set.month.hasAttribute(date.attributes.nfd))||(set.year.hasAttribute(date.attributes.nfd))){
						var htmlm=""
						var htmlj=""
						if(set.mode!="f"){
							if(set.year.hasAttribute(date.attributes.ymi)){
								var min=set.year.hasAttribute(date.attributes.ymi)
							}
							else{
								var min=date.defaultValues.ymi
							}
							if(year>set.defaultYear){
								year=set.defaultYear
							}
							var htmly=""
							while(min<=set.defaultYear){
								if(min==year){
									var checked=" selected"
								}
								else{
									var checked=""
								}
								htmly+="<option value='"+min+"'"+checked+">"+min+"</option>"
								min++
							}
							set.year.innerHTML=htmly
						}
						if(year==set.defaultYear){
							var dy=true
							var max=set.defaultMonth
						}
						else{
							var dy=false
							var max=12
						}
						set.mode="f"
						if(month>max){
							month=max
						}
						var i=1
						if(set.month.hasAttribute(date.attributes.ml)){
							var language=set.month.getAttribute(date.attributes.ml)
							while(i<=max){
								if(i==month){
									var checked=" selected"
								}
								else{
									var checked=""
								}
								htmlm+="<option value='"+i+"'"+checked+">"+date.language[language][i-1]+"</option>"
								i++
							}
						}
						else{
							while(i<=max){
								if(i==month){
									var checked=" selected"
								}
								else{
									var checked=""
								}
								htmlm+="<option value='"+i+"'"+checked+">"+i+"</option>"
								i++
							}
						}
						if((dy)&&(month==set.defaultMonth)){
							max=set.defaultDay
						}
						else{
							if(date.isbissextile(year)){
								daypermonth[1]++
							}
							max=daypermonth[month-1]
						}
						if(day>max){
							day=max
						}
						i=1
						while(i<=max){
							if(i==day){
								var checked=" selected"
							}
							else{
								var checked=""
							}
							htmlj+="<option value='"+i+"'"+checked+">"+i+"</option>"
							i++
						}
						set.day.innerHTML=htmlj
						set.month.innerHTML=htmlm
					}
					else{
						if(set.mode!="d"){
							if(set.year.hasAttribute(date.attributes.ymi)){
								var min=set.year.getAttribute(date.attributes.ymi)
							}
							else{
								var min=date.defaultValues.ymi
							}
							if(set.year.hasAttribute(date.attributes.yma)){
								var max=set.year.hasAttribute(date.attributes.yma)
							}
							else{
								var max=date.defaultValues.yma
							}
							var htmly=""
							while(min<=max){
								if(min==year){
									var checked=" selected"
								}
								else{
									var checked=""
								}
								htmly+="<option value='"+min+"'"+checked+">"+min+"</option>"
								min++
							}
							var htmlm=""
							var i=1
							if(set.month.hasAttribute(date.attributes.ml)){
								var language=set.month.getAttribute(date.attributes.ml)
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+date.language[language][i-1]+"</option>"
									i++
								}
							}
							else{
								while(i<=12){
									if(i==month){
										var checked=" selected"
									}
									else{
										var checked=""
									}
									htmlm+="<option value='"+i+"'"+checked+">"+i+"</option>"
									i++
								}
							}
							set.month.innerHTML=htmlm
							set.year.innerHTML=htmly
						}
						set.mode="d"
						var htmlj=""
						var i=1
						if(date.isbissextile(year)){
							daypermonth[1]+=1
						}
						if(day>daypermonth[month-1]){
							day=daypermonth[month-1]
						}
						var nbday=daypermonth[month-1]
						while(i<=nbday){
							if(i==day){
								var selected=" selected"
							}
							else{
								var selected=""
							}
							htmlj+="<option value='"+i+"'"+selected+">"+i+"</option>"
							i++
						}
						set.day.innerHTML=htmlj
					}
				}
			}
			fonction(date.set[id])
			if(date.set[id].month.addEventListener){
				date.set[id].month.addEventListener("change",date.set[id].onChange)
				date.set[id].year.addEventListener("change",date.set[id].onChange)
			}
			else if(date.set[id].month.attachEvent){
				date.set[id].month.attachEvent("change",date.set[id].onChange)
				date.set[id].year.attachEvent("change",date.set[id].onChange)
			}
			if(month.hasAttribute(date.attributes.def)){
				dvalue=month.getAttribute(date.attributes.def)
				if((dvalue.length==2)&&(dvalue[0]=="0")){
					dvalue=dvalue[1]
				}
			}
			else{
				dvalue=today.getMonth()+1
			}
			var mvalue=dvalue
			htmlm=""
			if(month.hasAttribute(date.attributes.ml)){
				if(nrt){
					var j=dvalue-1
					var m=j+1
					var max=12
				}
				else if(nfd){
					var j=0
					var m=1
					var max=mvalue
				}
				else{
					var j=0
					var m=1
					var max=12
				}
				var language=month.getAttribute(date.attributes.ml)
				while(j<max){
					if(m==dvalue){
						var selected=" selected"
					}
					else{
						var selected=""
					}
					htmlm+="<option value='"+m+"'"+selected+">"+date.language[language][j]+"</option>"
					j++
					m++
				}
			}
			else{
				if(nrt){
					j=dvalue
					var max=12
				}
				else if(nfd){
					j=1
					var max=mvalue
				}
				else{
					j=1
					var max=12
				}
				while(j<=max){
					if(j==dvalue){
						var selected=" selected"
					}
					else{
						var selected=""
					}
					htmlm+="<option value='"+j+"'"+selected+">"+j+"</option>"
					j++
				}
			}
			if(day.hasAttribute(date.attributes.def)){
				dvalue=day.getAttribute(date.attributes.def)
				if((dvalue.length==2)&&(dvalue[0]=="0")){
					dvalue=dvalue[1]
				}
			}
			else{
				dvalue=today.getDate()
			}
			if(date.isbissextile(yvalue)){
				daypermonth[1]++
			}
			htmld=""
			if(nrt){
				j=dvalue
			}
			else{
				j=1
			}
			max=daypermonth[mvalue-1]
			if(nfd){
				max=dvalue
			}
			while(j<=max){
				if(j==dvalue){
					var selected=" selected"
				}
				else{
					var selected=""
				}
				htmld+="<option value='"+j+"'"+selected+">"+j+"</option>"
				j++
			}
			year.innerHTML=htmly
			month.innerHTML=htmlm
			day.innerHTML=htmld
			date.set[id].defaultDay=parseInt(dvalue)
			date.set[id].defaultMonth=parseInt(mvalue)
			date.set[id].defaultYear=parseInt(yvalue)
			date.setlistid.push(id)
		}
		i++
	}
}
date.isset=function(id){
	return(typeof(date.set[id])!="undefined")
}
date.isbissextile=function(annee){
	return(new Date(annee,2,0).getDate()>=29)
}
date.searchMonthSelect=function(id){
	var months=date.months
	var i=0
	while(i<months.length){
		if(months[i].getAttribute(date.attributes.dm)==id){
			return(months[i])
		}
		i++
	}
}
date.searchDaySelect=function(id){
	var days=date.days
	var i=0
	while(i<days.length){
		if(days[i].getAttribute(date.attributes.dd)==id){
			return(days[i])
		}
		i++
	}
}
date.reset=function(id){
	if(id===undefined){
		var i=0
		var id=0
		while(i<date.setlistid.length){
			id=date.setlistid[i]
			if(date.set[id].month.removeEventListener){
				date.set[id].month.removeEventListener("change",date.set[id].onChange)
				date.set[id].year.removeEventListener("change",date.set[id].onChange)
			}
			else if(date.set[id].month.detachEvent){
				date.set[id].month.detachEvent("change",date.set[id].onChange)
				date.set[id].year.detachEvent("change",date.set[id].onChange)
			}
			date.set[id]=undefined
			i++
		}
		date.set={}
		date.setlistid=[]
		date.init()
	}
	else if(date.isset(id)){
		if(date.set[id].month.removeEventListener){
			date.set[id].month.removeEventListener("change",date.set[id].onChange)
			date.set[id].year.removeEventListener("change",date.set[id].onChange)
		}
		else if(date.set[id].month.detachEvent){
			date.set[id].month.detachEvent("change",date.set[id].onChange)
			date.set[id].year.detachEvent("change",date.set[id].onChange)
		}
		date.set[id]=undefined
		var i=0
		var ret=[]
		while(i<date.setlistid.length){
			if(date.setlistid[i]!=id){
				ret.push(date.setlistid[i])
			}
			i++
		}
		date.setlistid=ret
		date.init()
	}
}
date.delete=function(id){
	if(date.isset(id)){
		if(date.set[id].month.removeEventListener){
			date.set[id].month.removeEventListener("change",date.set[id].onChange)
			date.set[id].year.removeEventListener("change",date.set[id].onChange)
		}
		else if(date.set[id].month.detachEvent){
			date.set[id].month.detachEvent("change",date.set[id].onChange)
			date.set[id].year.detachEvent("change",date.set[id].onChange)
		}
		date.set[id]=undefined
		var i=0
		var ret=[]
		while(i<date.setlistid.length){
			if(date.setlistid[i]!=id){
				ret.push(date.setlistid[i])
			}
			i++
		}
		date.setlistid=ret
	}
}
date.changeMode=function(id,mode){
	if(date.isset(id)){
		if(mode===date.attributes.npd){
			if(date.set[id].mode=="f"){
				date.set[id].year.removeAttribute(date.attributes.nfd)
				date.set[id].month.removeAttribute(date.attributes.nfd)
				date.set[id].day.removeAttribute(date.attributes.nfd)
				date.set[id].day.setAttribute(date.attributes.npd,"")
				date.set[id].onChange()
			}
			else if(date.set[id].mode=="d"){
				date.set[id].day.setAttribute(date.attributes.npd,"")
				date.set[id].onChange()
			}
		}
		else if(mode===date.attributes.nfd){
			if(date.set[id].mode=="p"){
				date.set[id].year.removeAttribute(date.attributes.npd)
				date.set[id].month.removeAttribute(date.attributes.npd)
				date.set[id].day.removeAttribute(date.attributes.npd)
				date.set[id].day.setAttribute(date.attributes.nfd,"")
				date.set[id].onChange()
			}
			else if(date.set[id].mode=="d"){
				date.set[id].day.setAttribute(date.attributes.nfd,"")
				date.set[id].onChange()
			}
		}
		else if(mode==="default"){
			if(date.set[id].mode=="p"){
				date.set[id].year.removeAttribute(date.attributes.npd)
				date.set[id].month.removeAttribute(date.attributes.npd)
				date.set[id].day.removeAttribute(date.attributes.npd)
				date.set[id].onChange()
			}
			else if(date.set[id].mode=="f"){
				date.set[id].year.removeAttribute(date.attributes.nfd)
				date.set[id].month.removeAttribute(date.attributes.nfd)
				date.set[id].day.removeAttribute(date.attributes.nfd)
				date.set[id].onChange()
			}
		}
	}
}
date.init()
