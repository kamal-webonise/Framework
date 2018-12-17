<?php 
    abstract class MiddlewareCore{
        public abstract function secureHandle();
        public abstract function updateSession();
        public abstract function authenticateUser();
    }