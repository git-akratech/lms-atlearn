<?php

class __Mustache_d78f34fd170298cf5aced4979b45756a extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<nav class="moremenu navigation">
';
        $buffer .= $indent . '    <ul id="moremenu-';
        $value = $this->resolveValue($context->find('moremenuid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '-';
        $value = $this->resolveValue($context->find('navbarstyle'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '        role="';
        $value = $context->find('istablist');
        $buffer .= $this->sectionE8d02550eef8dd78cfe22b730ceb5426($context, $indent, $value);
        $value = $context->find('istablist');
        if (empty($value)) {
            
            $buffer .= 'menubar';
        }
        $buffer .= '"
';
        $buffer .= $indent . '        class="nav more-nav ';
        $value = $this->resolveValue($context->find('navbarstyle'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $value = $context->find('nodecollection');
        $buffer .= $this->section058eb0b7701c947acf419f49b7d1db88($context, $indent, $value);
        $value = $context->find('nodearray');
        $buffer .= $this->section4ae679486fb80f4b4fb9405d5cef4f8f($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->findDot('output.moremenu_group_item');
        $buffer .= $this->section714c6a3d5fa0262eb81403554b6c7b15($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->findDot('output.moremenu_custom_items'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        <li role="none" class="nav-item dropdown dropdownmoremenu d-none"
';
        $buffer .= $indent . '            data-region="morebutton">
';
        $buffer .= $indent . '            <a class="dropdown-toggle nav-link ';
        $value = $context->find('isactive');
        $buffer .= $this->section5749c750acb0d7477dd5257d00cc6d53($context, $indent, $value);
        $buffer .= '"
';
        $buffer .= $indent . '                href="#" id="moremenu-dropdown-';
        $value = $this->resolveValue($context->find('moremenuid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '"
';
        $buffer .= $indent . '                role="';
        $value = $context->find('istablist');
        $buffer .= $this->sectionC225dbeabea012d1739058de23648ffe($context, $indent, $value);
        $value = $context->find('istablist');
        if (empty($value)) {
            
            $buffer .= 'menuitem';
        }
        $buffer .= '"
';
        $buffer .= $indent . '                data-toggle="dropdown" aria-haspopup="true"
';
        $buffer .= $indent . '                aria-expanded="false" tabindex="-1">
';
        $buffer .= $indent . '                ';
        $value = $context->find('str');
        $buffer .= $this->section5575f70c07cf53c82349ae8d67eb5e68($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '            <ul class="dropdown-menu dropdown-menu-left"
';
        $buffer .= $indent . '                data-region="moredropdown"
';
        $buffer .= $indent . '                aria-labelledby="moremenu-dropdown-';
        $value = $this->resolveValue($context->find('moremenuid'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" role="menu">
';
        $buffer .= $indent . '            </ul>
';
        $buffer .= $indent . '        </li>
';
        $buffer .= $indent . '    </ul>
';
        $buffer .= $indent . '</nav>
';
        $value = $context->find('js');
        $buffer .= $this->section46f815545edcd22ccfcfcfc1d6d77341($context, $indent, $value);

        return $buffer;
    }

    private function sectionE8d02550eef8dd78cfe22b730ceb5426(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'tablist';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'tablist';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section4ae679486fb80f4b4fb9405d5cef4f8f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{> core/moremenu_children}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                if ($partial = $this->mustache->loadPartial('core/moremenu_children')) {
                    $buffer .= $partial->renderInternal($context, $indent . '        ');
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section058eb0b7701c947acf419f49b7d1db88(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        {{#children}}
        {{> core/moremenu_children}}
        {{/children}}
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $value = $context->find('children');
                $buffer .= $this->section4ae679486fb80f4b4fb9405d5cef4f8f($context, $indent, $value);
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section03a2cb78adf693fb240638cbbc7ea15e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'true';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'true';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section07b3ceab8d7100ef826c28857d1522f3(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'groups';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'groups';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section714c6a3d5fa0262eb81403554b6c7b15(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
        <li class="nav-item" role="none"
            data-forceintomoremenu="{{#forceintomoremenu}}true{{/forceintomoremenu}}{{^forceintomoremenu}}false{{/forceintomoremenu}}">
            <a role="menuitem" class="nav-link"
                href="{{ output.moremenu_group_item }}"
                aria-label="{{#str}}groups{{/str}}"
                tabindex="-1">
                {{#str}}groups{{/str}}
            </a>
        </li>
        ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '        <li class="nav-item" role="none"
';
                $buffer .= $indent . '            data-forceintomoremenu="';
                $value = $context->find('forceintomoremenu');
                $buffer .= $this->section03a2cb78adf693fb240638cbbc7ea15e($context, $indent, $value);
                $value = $context->find('forceintomoremenu');
                if (empty($value)) {
                    
                    $buffer .= 'false';
                }
                $buffer .= '">
';
                $buffer .= $indent . '            <a role="menuitem" class="nav-link"
';
                $buffer .= $indent . '                href="';
                $value = $this->resolveValue($context->findDot('output.moremenu_group_item'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '                aria-label="';
                $value = $context->find('str');
                $buffer .= $this->section07b3ceab8d7100ef826c28857d1522f3($context, $indent, $value);
                $buffer .= '"
';
                $buffer .= $indent . '                tabindex="-1">
';
                $buffer .= $indent . '                ';
                $value = $context->find('str');
                $buffer .= $this->section07b3ceab8d7100ef826c28857d1522f3($context, $indent, $value);
                $buffer .= '
';
                $buffer .= $indent . '            </a>
';
                $buffer .= $indent . '        </li>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5749c750acb0d7477dd5257d00cc6d53(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'active';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'active';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC225dbeabea012d1739058de23648ffe(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'tab';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'tab';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5575f70c07cf53c82349ae8d67eb5e68(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'moremenu, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'moremenu, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section46f815545edcd22ccfcfcfc1d6d77341(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'core/moremenu\'], function(moremenu) {
moremenu(document.querySelector(\'#moremenu-{{moremenuid}}-{{navbarstyle}}\'));
});
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'core/moremenu\'], function(moremenu) {
';
                $buffer .= $indent . 'moremenu(document.querySelector(\'#moremenu-';
                $value = $this->resolveValue($context->find('moremenuid'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '-';
                $value = $this->resolveValue($context->find('navbarstyle'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '\'));
';
                $buffer .= $indent . '});
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
