<?php

namespace BlancoEditor\Template;

/**
 * File code editor.
 */
interface Document
{
    /**
     * Set working directory string.
     */
    public static function setDirectory(string $directory) : void;

    /**
     * Get working directory string.
     */
    public static function getDirectory();

    /**
     * Print out formatted file.
     */
    public static function make(array $data) : void;

    /**
     * Format string before saving.
     */
    public static function format(string $data) : string;

    /**
     * Save in file option.
     */
    public static function save(string $file, string $data, string $mode = "w") : string;

    /**
     * Get list of files in working directory.
     */
    public static function getCommands() : array;

    /**
     * Get array of filenames in working directory.
     */
    public static function getFile(string $file) : array;

    /**
     * Get array of filenames in working directory.
     */
    public static function readFile(?string $filename) : array;

    /**
     * Generates array out available files as options in select tag.
     */
    public static function selectFile() : array;

    /**
     * Prints out select box.
     */
    public static function selectBox() : void;

    /**
     * Wraps contents in hidden html tag.
     */
    public static function hideContent(string $content) : string;

    /**
     * Wraps comment in span tag.
     */
    public static function wrapComment(string $comment) : string;

    /**
     * Wraps editable content in textarea tag.
     */
    public static function wrapEditable(string $content, ?string $class = null, ?string $onInput = 'convertP(this);') : string;

    /**
     * Wrap content in option tag.
     */
    public static function wrapOption(string $value, string $content) : string;

    /**
    * Renders hidden input out of filename.
    */
    public static function fileID(string $filename) : string;
    
    /**
    * Check if line is editable or not. Basic delimiter //editable.
    */
    public static function isEditable(string $line, string $delimiter = "//editable") : bool;

    /**
    * Check if line is empty or not.
    */
    public static function isEmpty(string $line) : bool;
}
