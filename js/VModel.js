function VModel(exObject) {
    var self = this;
    self.Race = function () {
        return {
            type: "race",
            name: ko.observable(),
            location: ko.observable(),
            discipline_id: ko.observable(),
            date: ko.observable(),
            price: ko.observable(),
            sex: ko.observable()
        };
    }

    self.Category = function () {
        return {
            type:"category",
            name: ko.observable()
        }
    }

    self.Discipline = function () {
        return {
            type: "discipline",
            name: ko.observable(),
            category: ko.observable(),
            description:ko.observable()
        };
    }

   self.Team = function () {
        return {
            type: "team",
            name: ko.observable(),
            competitors: ko.observableArray()
        };
    }

   self.Competitor = function () {
        return {
            type: "competitor",
            name:ko.observable(),
            age:ko.observable(),
            score:ko.observable(),
            discipline_id: ko.observable(),
            team_id: ko.observable(),
        }
    }

    self.User = function () {
        return {
            type: "user",
            username: ko.observable(),
            email: ko.observable(),
            password: ko.observable(),
            age: ko.observable(),
            sex: ko.observable()
        };
    }

    self.invokeWebService = function (url, dataParam, callBack) {
        $.ajax({
		    type: "POST",
            url: url,
            data: dataParam,
            success: function (result) {
                var jsonData =  $.parseJSON(result);
                if (callBack) {
                    callBack(jsonData);
                }
            }
        });
    }

    self.create = function () {
        if (exObject) {
            exObject(self);
        }
    }

    self.validate = function (selector) {
        var isValid = true;
        var inputToValidate = $(selector).find("input[required]").each(function () {
            if (!(this).checkValidity()) {
                isValid = false;
            }
        })
        return isValid;
    }

    self.reset = function(obj){
        for (var i in obj) {
            if(typeof obj[i] == "function"){
                obj[i](null);
            }
        }
     }

     self.set = function(obj,objData){
        for (var i in obj) {
            if(typeof obj[i] == "function"){
                obj[i](objData[i]);
            }
        }
     }
     
    self.save = function (url, data, callBack) {
        var jsonString = ko.mapping.toJSON(data);
        self.invokeWebService(url, { func: "SaveObject", param: jsonString }, callBack);
    }

    self.update = function (url, data, callBack) {
        var jsonString = ko.mapping.toJSON(data);
        self.invokeWebService(url, { func: "UpdateObject", param: jsonString }, callBack);
    }

    self.delete = function (url, data, callBack) {
        var jsonString = ko.mapping.toJSON(data);
        self.invokeWebService(url, { func: "DeleteObject", param: jsonString }, callBack);
    }

    self.bind = function () {
       ko.applyBindings(self);
    }

    self.create(exObject);
	
}