function  ViewModel (exObject) {
	 var self = this;
	 self.monuList;
	 self.competitors = ko.observableArray([]);
	 self.horisontalMenu = new Array(1, 2, 3, 5, 6);
	 self.verticalMenu;
	 self.create = function () {
	     if (exObject)
	     {
	         exObject(self);
	     }
	 }
	 self.isLoaded = ko.observable(false);

	 self.load = function (callBackFunk) {
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
	             self.competitors(jsonData);
	             
	         }
	     });
	 }
}

$(document).ready(function () {


  //  alert("da raboti");
})