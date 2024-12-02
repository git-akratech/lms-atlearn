<?php

class __Mustache_171cf562164e8ce6ab7ede1fffb61071 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<div id="courseindexdrawercontrols" class="dropdown">
';
        $buffer .= $indent . '  <button
';
        $buffer .= $indent . '    class="btn btn-icon btn-dark mx-2"
';
        $buffer .= $indent . '    type="button"
';
        $buffer .= $indent . '    data-toggle="dropdown"
';
        $buffer .= $indent . '    aria-haspopup="true"
';
        $buffer .= $indent . '    aria-expanded="false"
';
        $buffer .= $indent . '    title="';
        $value = $context->find('str');
        $buffer .= $this->section72de7bd71769771a8c5b8a91517a7a84($context, $indent, $value);
        $buffer .= '"
';
        $buffer .= $indent . '  >
';
        $buffer .= $indent . '    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
';
        $buffer .= $indent . '      <path
';
        $buffer .= $indent . '        fill="currentColor"
';
        $buffer .= $indent . '        d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"
';
        $buffer .= $indent . '      ></path>
';
        $buffer .= $indent . '      <path
';
        $buffer .= $indent . '        fill="currentColor"
';
        $buffer .= $indent . '        d="M13 8C13 8.55228 12.5523 9 12 9C11.4477 9 11 8.55228 11 8C11 7.44772 11.4477 7 12 7C12.5523 7 13 7.44772 13 8Z"
';
        $buffer .= $indent . '      ></path>
';
        $buffer .= $indent . '      <path
';
        $buffer .= $indent . '        fill="currentColor"
';
        $buffer .= $indent . '        d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"
';
        $buffer .= $indent . '      ></path>
';
        $buffer .= $indent . '    </svg>
';
        $buffer .= $indent . '  </button>
';
        $buffer .= $indent . '  <div class="dropdown-menu dropdown-menu-right">
';
        $buffer .= $indent . '    <a
';
        $buffer .= $indent . '      class="dropdown-item"
';
        $buffer .= $indent . '      href="#"
';
        $buffer .= $indent . '      data-action="expandallcourseindexsections"
';
        $buffer .= $indent . '    >
';
        $buffer .= $indent . '      ';
        $value = $context->find('str');
        $buffer .= $this->section5c42c2ba118f2e9924725a2f71fafad6($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '    <a
';
        $buffer .= $indent . '      class="dropdown-item"
';
        $buffer .= $indent . '      href="#"
';
        $buffer .= $indent . '      data-action="collapseallcourseindexsections"
';
        $buffer .= $indent . '    >
';
        $buffer .= $indent . '      ';
        $value = $context->find('str');
        $buffer .= $this->sectionE1c5833858b6a763436e852c524f170c($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</div>
';
        $value = $context->find('js');
        $buffer .= $this->sectionEc73cd02d14d991e85c958611aa79799($context, $indent, $value);

        return $buffer;
    }

    private function section72de7bd71769771a8c5b8a91517a7a84(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'courseindexoptions, courseformat';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'courseindexoptions, courseformat';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5c42c2ba118f2e9924725a2f71fafad6(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'expandall';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'expandall';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionE1c5833858b6a763436e852c524f170c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'collapseall';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'collapseall';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionEc73cd02d14d991e85c958611aa79799(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
require([\'theme_alpha/courseindexdrawercontrols\'], function(component) {
component.init(\'courseindexdrawercontrols\'); });
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . 'require([\'theme_alpha/courseindexdrawercontrols\'], function(component) {
';
                $buffer .= $indent . 'component.init(\'courseindexdrawercontrols\'); });
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
