<?php
/**
 * @param string $entity 
 */
function escape($entity) {
    return htmlentities($entity, ENT_QUOTES, 'UTF-8');
}