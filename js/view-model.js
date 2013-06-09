function  ViewModel (exObject) {
	 var self = this;
	 self.monuList;
	// self.horisontalMenu = new Array(1, 2, 3, 5, 6);
	 self.verticalMenu;
	 self.create = function () {
	     if (exObject)
	     {
	         exObject(self);
	     }
	 }
	 self.isLoaded = ko.observable(false);

	 self.loadHorisontalMenu = function (callBackFunk) {
	     self.isLoaded(true);
	     $.ajax({
	         url: "http://localhost:3333/getMenu.php",
	         success: function (result)
	         {
                 var jsonData = $.parseJSON(result);
	             if (callBackFunk)
	             {
	                 callBackFunk(jsonData);
	                 self.isLoaded(false);
	                
	             }
	             ko.mapping.fromJS(jsonData, {}, self);
	             ko.applyBindings(self);
	             self.horisontalMenu.push("ilko");
                 
	         }
	     });
	 }
}

$(document).ready(function () {


  //  alert("da raboti");
})