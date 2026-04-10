/**
 * Plugin JavaScript Compiler.
 */

// Utilities.
const path = require("path");
const { globSync } = require("glob");
const fs = require("fs");

// Constants.
const PluginPath = path.resolve("./");

// WordPress webpack config.
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

// Import the helper to find and generate the entry points in the src directory
const { getWebpackEntryPoints } = require("@wordpress/scripts/utils/config");

// Plugins.
const CopyPlugin = require("copy-webpack-plugin");

const RemoveEmptyScriptsPlugin = require("webpack-remove-empty-scripts");

const RtlCssPlugin = require("rtlcss-webpack-plugin");

module.exports = (env) => {
	return [
		{
			...defaultConfig,
			name: "Plugin",
			entry: {
				...getWebpackEntryPoints,
				editor: {
					import: path.resolve(PluginPath, "resources/js/", "editor.js"),
					filename: "js/[name].js",
				},
				global: {
					import: path.resolve(PluginPath, "resources/js/", "editor.js"),
					filename: "js/[name].js",
				},
				"css/global": {
					import: path.resolve(
						PluginPath,
						"resources/css/",
						"global.css",
					),
				},
				...Object.fromEntries(
					globSync(path.resolve(PluginPath, "resources/css/partials/*.css")).map(
						(file) => [
							`css/partials/${path.basename(file, ".css")}`,
							{ import: file },
						],
					),
				),
			},
			output: {
				...defaultConfig.output,
				path: PluginPath + "/build/",
				clean: {},
			},
			plugins: [
				...defaultConfig.plugins,
				new RemoveEmptyScriptsPlugin({
					stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
				}),
				new CopyPlugin({
					patterns: [
						{
							from: PluginPath + "/resources/svg/*.svg",
							to: "svg/[name][ext]",
							noErrorOnMissing: true,
						},
						{
							from: PluginPath + "/resources/fonts",
							to: PluginPath + "/build/fonts",
							noErrorOnMissing: true,
						},
						{
							from: PluginPath + "/resources/images",
							to: PluginPath + "/build/images",
							noErrorOnMissing: true,
						},
					],
				}),
			],
		},
	];
};
