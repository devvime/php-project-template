import path from "path";

export default {
  entry: "./src/index.js",
  output: {
    path: path.resolve('public', "dist"),
    filename: "bundle.js",
  },
};