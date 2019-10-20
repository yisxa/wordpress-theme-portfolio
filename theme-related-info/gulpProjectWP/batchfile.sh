echo Node Version:
node --version
echo NPM Version:
npm --version
echo NPX Version:
npx --version
npx mkdirp gulp-project && cd gulp-project && touch package.json
cat <<EOT >> package.json
{
  "name": "gulp-project",
  "version": "1.0.0",
  "description": "gulp4 webpack4 and babel7 automation",
  "main": "index.js",
  "dependencies": {
    "bootstrap": "^4.3.1",
    "jquery": "^3.3.1",
    "popper.js": "^1.14.7"
  },
  "devDependencies": {
    "@babel/cli": "^7.2.3",
    "@babel/core": "^7.4.0",
    "@babel/preset-env": "^7.4.2",
    "@babel/register": "^7.4.0",
    "babel-loader": "^8.0.5",
    "browser-sync": "^2.26.3",
    "css-loader": "^2.1.1",
    "eslint": "^5.15.3",
    "eslint-plugin-standard": "^4.0.0",
    "gulp": "^4.0.0",
    "gulp-cli": "^2.0.1",
    "html-loader": "^0.5.5",
    "html-webpack-plugin": "^3.2.0",
    "mini-css-extract-plugin": "^0.5.0",
    "webpack": "^4.29.6",
    "webpack-cli": "^3.3.0"
  },
  "scripts": {
    "es5": "babel src/index.js --out-dir conToES5",
    "lint": "eslint ./src/index.js --fix",
    "dev": "webpack --mode development ./app/index.js --output ./devWebpack/bundle.js --watch",
    "build": "webpack --mode production ./app/index.js --output ./distWebpack/bundle.js --watch"
  },
  "repository": {
    "type": "git",
    "url": "git+https://github.com/yisxa/gulp-project.git"
  },
  "keywords": [],
  "author": "",
  "license": "ISC",
  "bugs": {
    "url": "https://github.com/yisxa/gulp-project/issues"
  },
  "homepage": "https://github.com/yisxa/gulp-project#readme"
}

EOT

# install all packages in the node modules
npm install

#copy batchfile to the project directory
cp ../batchfile.sh batchfile.sh

#install gulp and gulp-cli globably
npm  install -g gulp gulp-cli

echo Gulp Version:
gulp --version

#create gulpfile.babel.js and .babelrc and .eslintrc
touch gulpfile.babel.js .babelrc .eslintrc
touch .eslintrc.json webpack.config.js

#for bundler use webpack.config.js
#EOT makes noises so printf is used for writing file
printf 'const HtmlWebPackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader"
        }
      },
      {
        test: /\.html$/,
        use: [
          {
            loader: "html-loader",
            options: { minimize: true }
          }
        ]
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"]
      }
    ]
  },
  plugins: [
    new HtmlWebPackPlugin({
      template: "./app/index.html",
      filename: "./index.html"
    }),
    new MiniCssExtractPlugin({
      filename: "[name].css",
      chunkFilename: "[id].css"
    })
  ]
};'>webpack.config.js
#for linting and code styling use .eslintrc
cat <<EOT >> .eslintrc
{
    "env": {
       "es6": true,
       "browser": true,
       "node": true,
       "jquery": true
    },
    "extends" : "standard",
    "plugins" : ["standard", "promise"],
    "rules" : {
    }
}
EOT

#for linting and code styling use .eslintrc.json
cat <<EOT >> .eslintrc.json
{
    "env": {
        "browser": true,
        "es6": true,
        "node": true
    },
    "extends": "eslint:recommended",
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parserOptions": {
        "ecmaVersion": 2018,
        "sourceType": "module"
    },
    "rules": {
    }
}
EOT

#for transpiling the code
cat <<EOT >> .babelrc
{
	"presets": ["@babel/preset-env"]
}
EOT

# writing configuration in gulpfile
cat <<EOT >> gulpfile.babel.js
import gulp from 'gulp';
// Step 0: import package from the node modules
import browserSync from 'browser-sync';

// Step 1: lets a create a browser-sync object
const server = browserSync.create();

// Step 2: defines a variable for BrowserLoading the html files from base directory
export const serve = (done) => {
	server.init({
		notify : false, // disable the browser sync connected notification
		// proxy: "http://localhost/ecom-php", // either by proxy url or
		server: { // from base directory url
            baseDir: "./src",
            browser: "google chrome"
        }
	});
	done();
}

// Step 3: reload the browser if any change is detected
export const reload = (done) => {
	server.reload();
	done();
}

// Step 4: for automatically detecting our files change we can use watch
export const watch = () => {
 // if a changed is detected then it will refresh the page
	gulp.watch('src/assets/styles/**/*.css', reload);
	gulp.watch('src/index.html', reload);
	gulp.watch('src/assets/scripts/**/*.js', reload);
} // now run 'gulp watch' to watch the task and ctrl+c to terminate the task

// Step 5: run gulp detectChange for loading the task
export const detectChange = gulp.series(serve, watch);

//default defines the ease of access: only run gulp and enjoy the task
//export default detectChange;
EOT

npx mkdirp src vendor app && cd src
npx mkdirp scripts styles images assets && touch index.js index.html robots.txt humans.txt crossdomain.xml 404.html browserconfig.xml site.webmanifest sitemap.xml
mkdir scripts/vendor styles/vendor

#writing on index.html
cat <<EOT >> index.html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <!-- favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">
  <title>Gulp automation for task Runner</title>

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
  <!-- normalize.css -->
  <link rel="stylesheet" href="assets/styles/vendor/normalize.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="assets/styles/font-awesome.min.css">

  <!-- bootstrap CSS -->
  <link rel="stylesheet" href="assets/styles/bootstrap.min.css">

  <!-- animate CSS -->
  <link rel="stylesheet" href="assets/styles/animate.min.css">

  <!-- magnific-popup CSS -->
  <link rel="stylesheet" href="assets/styles/magnific-popup.css">

  <!-- owl carousel CSS -->
  <link rel="stylesheet" href="assets/styles/owl.carousel.min.css">

  <!-- main customed style CSS -->
  <link rel="stylesheet" href="assets/styles/style.css">

  <!-- responsive CSS -->
  <link rel="stylesheet" href="assets/styles/responsive.css">

<!-- modernizr javascript for html shim/shiv -->
  <script src="assets/scripts/vendor/modernizr.js"></script>
</head>
<body>

  <h1>Welcome to Gulp Automation</h1>
  <p>How gulp automation is configured with gulp@4 + babel@6 + webpack@4 + deployment + production</p>


  <script src="assets/scripts/jquery.min.js"></script>
  <script src="assets/scripts/script.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <!-- <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
   ga('create', 'UA-1XXXXX-X', 'auto');
   ga('send', 'pageview');
  </script> -->

</script>
</body>
</html>
EOT
#writing on browserconfig.xml
cat <<EOT >> browserconfig.xml
<?xml version="1.0" encoding="utf-8"?>
<browserconfig>
    <msapplication>
        <tile>
            <square150x150logo src="/mstile-150x150.png"/>
            <TileColor>#da532c</TileColor>
        </tile>
    </msapplication>
</browserconfig>
EOT

#writing on sitemap.xml
cat <<EOT >> sitemap.xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset
	xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
	http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
	<loc>Your site Url/</loc>
	<lastmod>2019-03-22T08:27:13+00:00</lastmod>
</url>
</urlset>
EOT

#writing on site.webmanifest
cat <<EOT >> site.webmanifest
{
    "icons": [{
        "src": "icon.png",
        "sizes": "192x192",
        "type": "image/png"
    }],
    "start_url": "/"
}
EOT

#writing on humans.txt
cat <<EOT >> humans.txt
# humanstxt.org/
# The humans responsible & technology colophon

# TEAM

    <name> -- <role> -- <twitter>

# THANKS

    <name>

# TECHNOLOGY COLOPHON

    CSS3, HTML5
    Apache Server Configs, jQuery, Modernizr, Normalize.css

EOT

#writing on robots.txt
cat <<EOT >> robots.txt
# www.robotstxt.org/

# Allow crawling of all content
User-agent: *
Disallow:

EOT

#writing on 404.html
cat <<EOT >> 404.html
<!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <style>
            .row__middle {
              margin: auto;
              position: absolute;
              top: 50%; left: 50%;
              transform: translateX(-50%)translateY(-50%) ;

            }

            .row__middle--center {
                text-align: center;
                color: white;
                background: #F95D6A;
            }
        </style>
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>Document</title>
      </head>
      <body>
        <div class="row">
          <div class="row__middle">
	          		<h1 class="row__middle--center">Don't go! Just try after sometime</h1>
	                    <svg width="426px" height="270px" viewBox="0 0 426 270" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch  -->
                <desc>Created by cyberabc.</desc>
                <defs>
                    <linearGradient x1="51.4672527%" y1="-76.6751214%" x2="50.7794001%" y2="109.521217%" id="linearGradient-1">
                        <stop stop-color="#FDAD00" offset="0%"></stop>
                        <stop stop-color="#FB7700" offset="24.9557297%"></stop>
                        <stop stop-color="#FB7500" offset="61.4860983%"></stop>
                        <stop stop-color="#FB7500" offset="100%"></stop>
                    </linearGradient>
                </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Group" transform="translate(-1.000000, -118.000000)">
                        <path d="M19.4656931,216.773448 C7.59868758,197.683084 1,176.52652 1,154.261005 C1,69.6172891 96.3633483,1 214,1 C331.636652,1 427,69.6172891 427,154.261005 C427,175.261041 421.130081,195.274599 410.506422,213.498548 C413.450111,203.049175 415,192.203782 415,181.081681 C415,96.4379649 325.233092,27.8206758 214.5,27.8206758 C103.766908,27.8206758 14,96.4379649 14,181.081681 C14,193.370396 15.8920813,205.321311 19.4657069,216.773492 Z" id="Combined-Shape" fill="url(#linearGradient-1)" transform="translate(214.000000, 167.671343) scale(1, -1) translate(-214.000000, -167.671343) "></path>
                        <path d="M19.8028049,387.226543 C7.72372187,363.824804 1,337.849917 1,310.5 C1,207.498894 96.3633483,124 214,124 C331.636652,124 427,207.498894 427,310.5 C427,336.288924 421.021886,360.855299 410.212841,383.194666 C413.34697,370.095525 415,356.477326 415,342.5 C415,239.498894 325.233092,156 214.5,156 C103.766908,156 14,239.498894 14,342.5 C14,357.917325 16.0111782,372.897714 19.8028098,387.226552 Z" id="Combined-Shape" fill="#EC5E53"></path>
                        <text id="404-Page-not-found" font-family="Helvetica" font-size="38" font-weight="normal">
                            <tspan x="71" y="215" fill="#000000">				</tspan>
                            <tspan x="183" y="215" font-family="HiraMinProN-W6, Hiragino Mincho ProN" font-weight="500" fill="#33BAC7">404</tspan>
                            <tspan x="71" y="261" font-family="HiraMinProN-W6, Hiragino Mincho ProN" font-weight="500" fill="#33BAC7">Page not found</tspan>
                        </text>
                    </g>
                </g>
            </svg>
          </div>
        </div>
      </body>
      </html>
EOT

#writing on index.js
cat <<EOT >> index.js
// ES6
const array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
const divisibleBy3ES6 = array.filter(v => v % 3 === 0);
console.log(divisibleBy3ES6); // [3, 6, 9, 12, 15]

let arr = [1, 4, 9];
let squareRoots = arr.map((num) =>Math.sqrt(num));
console.log(squareRoots)
EOT

#writing on crossdomain.xml
cat <<EOT >> crossdomain.xml
<?xml version="1.0"?>
<!DOCTYPE cross-domain-policy SYSTEM "http://www.adobe.com/xml/dtds/cross-domain-policy.dtd">
<cross-domain-policy>
    <!-- Read this: www.adobe.com/devnet/articles/crossdomain_policy_file_spec.html -->

    <!-- Most restrictive policy: -->
    <site-control permitted-cross-domain-policies="none"/>

    <!-- Least restrictive policy: -->
    <!--
    <site-control permitted-cross-domain-policies="all"/>
    <allow-access-from domain="*" to-ports="*" secure="false"/>
    <allow-http-request-headers-from domain="*" headers="*" secure="false"/>
    -->
</cross-domain-policy>
EOT

cd styles && touch style.css responsive.css
cat <<EOT >> style.css
body{
  background-color: orange;
}
EOT
cd .. && cd scripts && touch script.js

cat <<EOT >> script.js
alert("Welcome to gulp automation task!");
EOT

cd ../../ && cd vendor && touch download.js

# writing on download.js
cat <<EOT >> download.js
let filesDownload = require('fs');
let https = require('https');

let htaccessApache = "https://raw.githubusercontent.com/h5bp/server-configs-apache/master/dist/.htaccess";
let normalizeUrl = "https://necolas.github.io/normalize.css/8.0.1/normalize.css";
let jQueryUrl = "https://code.jquery.com/jquery-3.3.1.min.js";
let modernizrUrl = "https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js";
let bootstrapUrl = "https://raw.githubusercontent.com/twbs/bootstrap/master/dist/css/bootstrap.min.css";
let fontAwesomeUrl = "https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/css/all.min.css";
let animateCSSUrl = "https://raw.githubusercontent.com/daneden/animate.css/master/animate.min.css";
let magnificPopupUrl = "https://raw.githubusercontent.com/dimsemenov/Magnific-Popup/master/dist/magnific-popup.css";
let owlCarouselUrl2 = "https://raw.githubusercontent.com/OwlCarousel2/OwlCarousel2/develop/dist/owl.carousel.min.js";

let faviconIcoUrl = "https://raw.githubusercontent.com/yisxa/responsive-webdesign-xivig/master/app/favicon.ico";

let downFilefaviconIcoUrl = filesDownload.createWriteStream("favicon.ico");

let request14 = https.get(faviconIcoUrl, function(response){
  response.pipe(downFilefaviconIcoUrl);
});

let owlCarouselUrl3 = "https://raw.githubusercontent.com/OwlCarousel2/OwlCarousel2/develop/dist/assets/owl.carousel.min.css";

let downFileOwlCarousel3 = filesDownload.createWriteStream("owl.carousel.min.css");

let request9 = https.get(owlCarouselUrl3, function(response){
  response.pipe(downFileOwlCarousel3);
});

let responJsUrl = "https://raw.githubusercontent.com/scottjehl/Respond/master/dest/respond.min.js";

let downFileResponJsUrl = filesDownload.createWriteStream("respond.min.js");

let request12 = https.get(responJsUrl, function(response){
  response.pipe(downFileResponJsUrl);
});

let request10 = https.get(htaccessApache, function(response){
  response.pipe(downFileHtaccessApache);
});

let downFileHtaccessApache = filesDownload.createWriteStream(".htaccess");
let downFileNormalize = filesDownload.createWriteStream("normalize.css");
let downFileJquery = filesDownload.createWriteStream("jquery.min.js");
let downFileModernizr = filesDownload.createWriteStream("modernizr.js");
let downFileBootstrap = filesDownload.createWriteStream("bootstrap.min.css");
let downFileFontAwesome = filesDownload.createWriteStream("all.min.css");
let downFileAnimateCSS = filesDownload.createWriteStream("animate.min.css");
let downFileMagnificPopup = filesDownload.createWriteStream("magnific-popup.css");

let downFileOwlCarousel2 = filesDownload.createWriteStream("owl.carousel.min.js");

let request3 = https.get(bootstrapUrl, function(response){
  response.pipe(downFileBootstrap);
});

let request = https.get(normalizeUrl, function(response){
  response.pipe(downFileNormalize);
});

let request1 = https.get(jQueryUrl, function(response){
  response.pipe(downFileJquery);
});

let request2 = https.get(modernizrUrl, function(response){
  response.pipe(downFileModernizr);
});

let request4 = https.get(fontAwesomeUrl, function(response){
  response.pipe(downFileFontAwesome);
});
let request5 = https.get(animateCSSUrl, function(response){
  response.pipe(downFileAnimateCSS);
});
let request6 = https.get(magnificPopupUrl, function(response){
  response.pipe(downFileMagnificPopup);
});
let request8 = https.get(owlCarouselUrl2, function(response){
  response.pipe(downFileOwlCarousel2);
});
EOT

# running the download.js file in node
node download.js

#copying files to the apropriate folder
cp .htaccess ../src
cp jquery.min.js ../src/scripts
cp respond.min.js ../src/scripts
cp animate.min.css ../src/styles
cp magnific-popup.css ../src/styles
cp favicon.ico ../src/images

#unzip fontawesome-free-5.8.0-web.zip
# renaming fontawesome-free-5.8.0-web directory to fontawesome-5.8.0
#mv -f fontawesome-free-5.8.0-web fontawesome-5.8.0
#deleting the directories
#rm -ivrf fontawesome-5.8.0

#copying the all.min.css to the current location renaming to font-awesome.min.css
cp all.min.css font-awesome.min.css
#moving the font-awesome.min.css to css directory
mv font-awesome.min.css ../src/styles

#git clone https://github.com/twbs/bootstrap.git
npm install bootstrap

#unzip bootstrap-4.0.0.zip
#copying bootstrap files to styles directory
cp bootstrap.min.css ../src/styles

cp owl.carousel.min.css ../src/styles
cp owl.carousel.min.js ../src/scripts
cp normalize.css ../src/styles/vendor
cp modernizr.js ../src/scripts/vendor

cd .. && cd src
##copying css js and img folder recurvively to assets directory
cp -r {styles,scripts,images} assets

## removing css js and img file
rm -irvf {styles,scripts,images}

# change to project directory and
#open the current directory in the atom editor
#open new bash shell
cd .. && rm -ivrf vendor && cd app && touch index.js main.css index.html
#writing on index.js
cat <<EOT >> index.js
// ES6
import style from "./main.css";
const array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
const divisibleBy3ES6 = array.filter(v => v % 3 === 0);
console.log(divisibleBy3ES6); // [3, 6, 9, 12, 15]

let arr = [1, 4, 9];
let squareRoots = arr.map((num) =>Math.sqrt(num));
console.log(squareRoots)
alert("cool");
EOT

#writing on index.html
cat <<EOT >> index.html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <title>Webpack bundle creation</title>

  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- main customed style CSS -->
  <link rel="stylesheet" href="main.css">

</head>
<body>

  <h1>Webpack bundle creation with javascript and css</h1>

  <h2>How to configure webpack@4 + deployment + production</h2>
  <h3>For webpack@4 deployment run the following command in terminal</h3>
  <div class="codestyle"><code>npm run deb</code></div>
  <p>**Njoy!</p>

  <h3>For webpack@4 production run the following command in terminal</h3>
  <div class="codestyle"><code>npm run build</code></div>
  <p>**Njoy!</p>

  <script src="bundle.js"></script>

</script>
</body>
</html>
EOT

#writing on main.css
cat <<EOT >> main.css
body{
  font-size: 18px;
}
.codestyle {
  margin: auto;
  padding: 10px;
  font-size: 24px;
  font-weight: 500;
  width: auto;
  height: 50px;
  background-color: #190D01;
  color: #51B404;
}

p{
  color: #D0021B;
}
EOT

cd .. && atom . && bash
