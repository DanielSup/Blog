/**
 * Created by HP on 11.7.2018.
 */

var offset = 2;
function loadArticles(baseurl){
    $.get({
            url: baseurl+"api/article/"+offset
    }).done(function (data) {
        for(var i in data){
            var article = data[i];
            loadArticle(baseurl, article.id, article.title, article.photo, article.perex);
        }
        offset+=2;
    });
}

var Article = function(baseurl, id, title, photo, perex){
    this.id = id;
    this.title = title;
    this.photo = photo;
    this.perex = perex;
    this.baseurl = baseurl;
};

Article.prototype.getTitle = function(){
    return $("<h1>"+this.title+"</h1>");
};

Article.prototype.getPhoto = function(){
    return $("<img class='thumbnail' " +
        "src='"+this.photo+"' " +
        "alt='"+this.title+" ilustration photo'>");
};

Article.prototype.getPerex = function(){
    return $("<p>"+this.perex+"</p>");
};

Article.prototype.getLink = function(){
    return $("<a href=\""+this.baseurl+"article/"+this.id+"\" " +
        "class=\"read-article\">Přečíst článek</a>");
};


function loadArticle(baseurl, id, title, photo, perex){
    var article = new Article(baseurl, id, title, photo, perex);
    var list = $("#article-list");
    var newItem = $("<li></li>");
    var div = $("<div class=\"article-view\"></div>");
    div.append(article.getTitle());
    div.append(article.getPhoto());
    div.append(article.getPerex());
    newItem.append(div);
    newItem.append(article.getLink());
    list.append(newItem);
}