function VModel(exObject) {
    var self = this;
    self.invokeWebService = function (url, dataParam, callBack) {
        $.ajax({
            url: url,
            data: dataParam,
            success: function (result) {
                var jsonData = $.parseJSON(result);
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

    self.bind = function (callBack) {
        ko.applyBindings(self);
        if (callBack) {
            callBack(self);
        }
    }
	self.create(exObject);
}