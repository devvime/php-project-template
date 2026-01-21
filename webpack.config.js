import path from "path";

export default {
  entry: "./src/main.js",
  output: {
    path: path.resolve('public', "dist/js"),
    filename: "app.js",
  },
};