(function ($, cb) {
    $.when( $.get('api/project_timeline.json', 'json')).then(function(data) {
        cb(data.timeline, data.file_download, data.file_online, data.team, data.messages, data.client_info, data.contacts, data.project_info, data.project_name);
    });

})(jQuery, function(timeline, file_download, file_online, team, messages, client_info, contacts, project_info, project_name) {

//ProjectName
    //define product model
    var ProjectName = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var ProjectNameDir = Backbone.Collection.extend({
        model: ProjectName
    });

    //define individual ProjectName view
    var ProjectNameView = Backbone.View.extend({
        tagName: "div",
        className: "",
        template: $("#ProjectNameTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var ProjectNameDirectoryView = Backbone.View.extend({
        el: $("#project_Name_script"),

        initialize: function () {
            this.collection = new ProjectNameDir(project_info);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderProjectName(item);
            }, this);
        },

        renderProjectName: function (item) {
            var projectNameView = new ProjectNameView({
                model: item
            });
            this.$el.append(projectNameView.render().el);
        }
    });
//

//ProjectInfo
    //define product model
    var ProjectInfo = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var ProjectInfoDir = Backbone.Collection.extend({
        model: ProjectInfo
    });

    //define individual ProjectInfo view
    var ProjectInfoView = Backbone.View.extend({
        tagName: "table",
        className: "table table-hover",
        template: $("#ProjectInfoTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var ProjectInfoDirectoryView = Backbone.View.extend({
        el: $("#project_info_script"),

        initialize: function () {
            this.collection = new ProjectInfoDir(project_info);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderProjectInfo(item);
            }, this);
        },

        renderProjectInfo: function (item) {
            var projectInfoView = new ProjectInfoView({
                model: item
            });
            this.$el.append(projectInfoView.render().el);
        }
    });
//
    
//Timeline
    //define timeline model
    var Timeline = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var TimelineDir = Backbone.Collection.extend({
        model: Timeline
    });

    //define individual Timeline view
    var TimelineView = Backbone.View.extend({
        tagName: "li",
        className : function () { return this.model.get( "direction" ); },

        template: $("#TimelineTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    var TimelineFooterItemView = Backbone.View.extend({
        tagName: "div",
        className : "col-lg-12",

        template: $("#TimelineFooterTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);

            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    var TimelineHeaderItemView = Backbone.View.extend({
        tagName: "div",
        className : "col-lg-12",

        template: $("#TimelineHeaderTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);

            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var TimelineDirectoryView = Backbone.View.extend({
        el: $("#home"),
        footerItem: null,
        headerItem: null,
        middleItemsCollection: null,
        middleItems: [],

        initialize: function () {
            if (timeline.length === 0) throw new Error("expected timeline");

            var headerItemModel = new Timeline(timeline[0]);
            this.headerItem = new TimelineHeaderItemView({model: headerItemModel});

            if (timeline.length > 1) {

                var footerItemModel = new Timeline(timeline[timeline.length-1]);
                this.footerItem = new TimelineFooterItemView({model: footerItemModel});

                this.middleItemsCollection = new TimelineDir(timeline.slice(1, timeline.length - 1));
                this.middleItemsCollection.each(function (item) {
                    this.middleItems.push(new TimelineView({
                        model: item
                    }));
                }, this);
            }
            this.render();
        },

        render: function () {
            this.renderHeaderItem();
            this.renderFooterItem();

            this.middleItemsCollection &&
                _(this.middleItems).each(function (timelineView) {
                    this.renderMiddleItem(timelineView);
                }, this);
        },

        renderHeaderItem: function() {
            this.headerItem && this.$('#timeline_header')
                    .append(this.headerItem.render().el);
        },
        renderFooterItem: function() {
            this.footerItem && this.$('#timeline_footer')
                    .append(this.footerItem.render().el);
        },

        renderMiddleItem: function (timelineView) {
            this.$('#timeline_script').append(timelineView.render().el);
        }
    });
//
    
//Team
        //define product model
    var Team = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var TeamDir = Backbone.Collection.extend({
        model: Team
    });

    //define individual Team view
    var TeamView = Backbone.View.extend({
        tagName: "tr",
        className: "",
        template: $("#TeamTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var TeamDirectoryView = Backbone.View.extend({
        el: $("#team_script"),

        initialize: function () {
            this.collection = new TeamDir(team);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderTeam(item);
            }, this);
        },

        renderTeam: function (item) {
            var teamView = new TeamView({
                model: item
            });
            this.$el.append(teamView.render().el);
        }
    });
//
    
//FilesD
        //define product model
    var FilesD = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var FilesDDir = Backbone.Collection.extend({
        model: FilesD
    });

    //define individual FilesD view
    var FilesDView = Backbone.View.extend({
        tagName: "tr",
        className: "",
        template: $("#FilesDTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var FilesDDirectoryView = Backbone.View.extend({
        el: $("#filesD_script"),

        initialize: function () {
            this.collection = new FilesDDir(file_download);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderFilesD(item);
            }, this);
        },

        renderFilesD: function (item) {
            var filesD = new FilesDView({
                model: item
            });
            this.$el.append(filesD.render().el);
        }
    });
//
    
//FilesO
        //define product model
    var FilesO = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var FilesODir = Backbone.Collection.extend({
        model: FilesO
    });

    //define individual FilesO view
    var FilesOView = Backbone.View.extend({
        tagName: "tr",
        className: "",
        template: $("#FilesOTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var FilesODirectoryView = Backbone.View.extend({
        el: $("#filesO_script"),

        initialize: function () {
            this.collection = new FilesODir(file_online);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderFilesO(item);
            }, this);
        },

        renderFilesO: function (item) {
            var filesO = new FilesOView({
                model: item
            });
            this.$el.append(filesO.render().el);
        }
    });
//

//Messages
    //define product model
    var Messages = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var MessagesDir = Backbone.Collection.extend({
        model: Messages
    });

    //define individual Messages view
    var MessagesView = Backbone.View.extend({
        tagName: "div",
        className: "panel panel-info",
        template: $("#MessagesTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var MessagesDirectoryView = Backbone.View.extend({
        el: $("#messages_script"),

        initialize: function () {
            this.collection = new MessagesDir(messages);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderMessages(item);
            }, this);
        },

        renderMessages: function (item) {
            var messagesView = new MessagesView({
                model: item
            });
            this.$el.append(messagesView.render().el);
        }
    });
//

//ClientInfo
    //define product model
    var ClientInfo = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var ClientInfoDir = Backbone.Collection.extend({
        model: ClientInfo
    });

    //define individual ProjectInfo view
    var ClientInfoView = Backbone.View.extend({
        tagName: "div",
        className: "",
        template: $("#ClientInfoTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var ClientInfoDirectoryView = Backbone.View.extend({
        el: $("#client_info_script"),

        initialize: function () {
            this.collection = new ClientInfoDir(client_info);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderClientInfo(item);
            }, this);
        },

        renderClientInfo: function (item) {
            var clientInfoView = new ClientInfoView({
                model: item
            });
            this.$el.append(clientInfoView.render().el);
        }
    });
//
  
//Contacts
    //define product model
    var Contacts = Backbone.Model.extend({
        defaults: {
        }
    });

    //define directory collection
    var ContactsDir = Backbone.Collection.extend({
        model: Contacts
    });

    //define individual Contacts view
    var ContactsView = Backbone.View.extend({
        tagName: "div",
        className: "",
        template: $("#ContactsTemplate").html(),

        render: function () {
            var tmpl = _.template(this.template);
            
            $(this.el).html(tmpl(this.model.toJSON()));
            return this;
        }
    });

    //define master view
    var ContactsDirectoryView = Backbone.View.extend({
        el: $("#contacts_script"),

        initialize: function () {
            this.collection = new ContactsDir(contacts);
            this.render();
        },

        render: function () {
            var that = this;
            _.each(this.collection.models, function (item) {
                that.renderContacts(item);
            }, this);
        },

        renderContacts: function (item) {
            var contactsView = new ContactsView({
                model: item
            });
            this.$el.append(contactsView.render().el);
        }
    });
//
   
    //create instance of master view
    var directoryProjectInfo = new ProjectInfoDirectoryView();
    var directoryProjectName = new ProjectNameDirectoryView();
    var directoryTimeline = new TimelineDirectoryView();
    var directoryTeam = new TeamDirectoryView();
    var directoryFilesD = new FilesDDirectoryView();
    var directoryFilesO = new FilesODirectoryView();
    var directoryMessages = new MessagesDirectoryView();
    var directoryClientInfo = new ClientInfoDirectoryView();
    var directoryContacts = new ContactsDirectoryView();

});