1. Open Git bash
2. type node -v && npm -v
3. type npm init for creating package.json file
4. tpye npm install -g gulp gulp-cli
5. type npm install gulp gulp-cli --save-dev
6.# Babel 7
npm install --save-dev gulp-babel@next @babel/core
7. create a file by running the command touch gulpfile.babel.js
8. npm install browser-sync --save-dev
9. create a file named .babelrc
10.npm install @babel/preset-env --save-dev
11. paste the following line in the .babelrc file
{
  "presets": ["@babel/preset-env"]
}

12.npm install @babel/register babel-loader --save-dev
13. paste the following line in the gulpfile.babel.js file

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
export default detectChange;


14. create a file named webpack.config.js and write the following in it

module: {
  rules: [
    {
      test: /\.m?js$/,
      exclude: /(node_modules|bower_components)/,
      use: {
        loader: 'babel-loader',
        options: {
          presets: ['@babel/preset-env']
        }
      }
    }
  ]
}


14. run gulp and voilla!