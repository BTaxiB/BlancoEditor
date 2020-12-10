<?php

namespace JetRefacto\Template;

/**
 * File code editor.
 */
interface Document
{
    /**
     * Set working directory string;
     */
    public static function setDirectory(string $directory) : void;

    /**
     * Get working directory string;
     */
    public static function getDirectory() : string;

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
}
