Kanboard.BoardPolling = function(app) {
    this.app = app;
    this.timer = null;
    this.requestInProgress = false;
};

Kanboard.BoardPolling.prototype.execute = function() {
    if (this.app.hasId("board")) {
        var interval = parseInt($("#board").attr("data-check-interval"));

        if (interval > 0) {
            // Keep a single timer even if the controller is initialized more than once.
            if (this.timer === null) {
                this.timer = window.setInterval(this.check.bind(this), interval * 1000);
            }
        }
    }
};

Kanboard.BoardPolling.prototype.check = function() {
    if (this.requestInProgress || !KB.utils.isVisible() || this.app.get("BoardDragAndDrop").savingInProgress) {
        return;
    }

    var self = this;
    this.requestInProgress = true;
    this.app.showLoadingIcon();

    $.ajax({
        cache: false,
        url: $("#board").data("check-url"),
        statusCode: {
            200: function(data) {
                self.app.get("BoardDragAndDrop").refresh(data);
            },
            304: function () {
                self.app.hideLoadingIcon();
            }
        },
        complete: function () {
            self.requestInProgress = false;
            self.app.hideLoadingIcon();
        }
    });
};
