<?php

class __Mustache_b727cdc3ceaf788debc023e5c053f3b5 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $context->find('hasblocks');
        $buffer .= $this->sectionC3b7915a10723fcfdbb004d7d2f29a83($context, $indent, $value);

        return $buffer;
    }

    private function section245ba37b5a58f162a63e0d10700eb739(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'opendrawerblocks, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'opendrawerblocks, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1cb47d3ed9b97c6d6d496d2358bec253(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = ' show';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= ' show';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC14df02445cdd505a0208e8a56a5f32e(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'blocks';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'blocks';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1bd0cc4642e36d67e46c9dd550f1fa06(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '1';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '1';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section31618380a8d2d407a8b2acf35dd449a4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'closeblockdrawer, core';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'closeblockdrawer, core';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionC3b7915a10723fcfdbb004d7d2f29a83(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <div id="drawerTogglerRight" class="drawer-toggler drawer-right-toggle ml-auto d-print-none">
        <button class="btn rui-icon-no-margin" data-toggler="drawers" data-action="toggle" data-target="theme_alpha-drawers-blocks" data-toggle="tooltip" data-placement="right" title="{{#str}}opendrawerblocks, core{{/str}}">
            <span class="sr-only">{{#str}}opendrawerblocks, core{{/str}}</span>
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;">
                    <g transform="matrix(1,0,0,1,-2,0)">
                        <path d="M18.333,15L18.333,5C18.333,3.629 17.205,2.5 15.833,2.5L14.167,2.5C12.795,2.5 11.667,3.629 11.667,5L11.667,15C11.667,16.371 12.795,17.5 14.167,17.5L15.833,17.5C17.205,17.5 18.333,16.371 18.333,15Z" style="fill:none;fill-rule:nonzero;stroke:currentColor;stroke-width:1.67px;" />
                    </g>
                    <g transform="matrix(1,0,0,1,-2,0)">
                        <path d="M11.667,10L5,10M5,10L7.5,7.5M5,10L7.5,12.5" style="fill:none;fill-rule:nonzero;stroke:currentColor;stroke-width:1.25px;stroke-linecap:round;stroke-linejoin:round;" />
                    </g>
                </svg>

            </span>
        </button>
    </div>
    {{< theme_alpha/drawer }}
    {{$id}}theme_alpha-drawers-blocks{{/id}}
    {{$drawerclasses}}drawer drawer-right rui-right-drawer{{#blockdraweropen}} show{{/blockdraweropen}}{{/drawerclasses}}
    {{$drawercontent}}
    <section class="d-print-none" aria-label="{{#str}}blocks{{/str}}">
        {{{ addblockbutton }}}
        {{{ sidepreblocks }}}
    </section>
    {{/drawercontent}}
    {{$drawerpreferencename}}drawer-open-block{{/drawerpreferencename}}
    {{$forceopen}}{{#forceblockdraweropen}}1{{/forceblockdraweropen}}{{/forceopen}}
    {{$drawerstate}}show-drawer-right{{/drawerstate}}
    {{$tooltipplacement}}left{{/tooltipplacement}}
    {{$drawercloseonresize}}1{{/drawercloseonresize}}
    {{$closebuttontext}}{{#str}}closeblockdrawer, core{{/str}}{{/closebuttontext}}
    {{/ theme_alpha/drawer}}
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <div id="drawerTogglerRight" class="drawer-toggler drawer-right-toggle ml-auto d-print-none">
';
                $buffer .= $indent . '        <button class="btn rui-icon-no-margin" data-toggler="drawers" data-action="toggle" data-target="theme_alpha-drawers-blocks" data-toggle="tooltip" data-placement="right" title="';
                $value = $context->find('str');
                $buffer .= $this->section245ba37b5a58f162a63e0d10700eb739($context, $indent, $value);
                $buffer .= '">
';
                $buffer .= $indent . '            <span class="sr-only">';
                $value = $context->find('str');
                $buffer .= $this->section245ba37b5a58f162a63e0d10700eb739($context, $indent, $value);
                $buffer .= '</span>
';
                $buffer .= $indent . '            <span>
';
                $buffer .= $indent . '                <svg width="20" height="20" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;">
';
                $buffer .= $indent . '                    <g transform="matrix(1,0,0,1,-2,0)">
';
                $buffer .= $indent . '                        <path d="M18.333,15L18.333,5C18.333,3.629 17.205,2.5 15.833,2.5L14.167,2.5C12.795,2.5 11.667,3.629 11.667,5L11.667,15C11.667,16.371 12.795,17.5 14.167,17.5L15.833,17.5C17.205,17.5 18.333,16.371 18.333,15Z" style="fill:none;fill-rule:nonzero;stroke:currentColor;stroke-width:1.67px;" />
';
                $buffer .= $indent . '                    </g>
';
                $buffer .= $indent . '                    <g transform="matrix(1,0,0,1,-2,0)">
';
                $buffer .= $indent . '                        <path d="M11.667,10L5,10M5,10L7.5,7.5M5,10L7.5,12.5" style="fill:none;fill-rule:nonzero;stroke:currentColor;stroke-width:1.25px;stroke-linecap:round;stroke-linejoin:round;" />
';
                $buffer .= $indent . '                    </g>
';
                $buffer .= $indent . '                </svg>
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '            </span>
';
                $buffer .= $indent . '        </button>
';
                $buffer .= $indent . '    </div>
';
                $buffer .= $indent . '    ';
                if ($parent = $this->mustache->loadPartial('theme_alpha/drawer')) {
                    $context->pushBlockContext(array(
                        'id' => array($this, 'blockB90e42bbf67ac5c2ad7b7ce3f7b51469'),
                        'drawerclasses' => array($this, 'blockAab616a7ad3bc963c9c8af4edc817ba8'),
                        'drawercontent' => array($this, 'block66d65e25fb753137130038e2eb5f751b'),
                        'drawerpreferencename' => array($this, 'block59146569a56c3d2642fa2e8224817be0'),
                        'forceopen' => array($this, 'block13847ba3219919ecdb2378620735177c'),
                        'drawerstate' => array($this, 'block0ea572ae0e89f9c5cc1dc5d7238a50d5'),
                        'tooltipplacement' => array($this, 'blockC945de95615645c65d6b2f192042e6ea'),
                        'drawercloseonresize' => array($this, 'blockE052079a625ca42b568ba24af19cc7eb'),
                        'closebuttontext' => array($this, 'blockC879444321d250421c3438099ae68173'),
                    ));
                    $buffer .= $parent->renderInternal($context, $indent);
                    $context->popBlockContext();
                }
                $context->pop();
            }
        }
    
        return $buffer;
    }

    public function blockB90e42bbf67ac5c2ad7b7ce3f7b51469($context)
    {
        $indent = $buffer = '';
        $buffer .= 'theme_alpha-drawers-blocks';
    
        return $buffer;
    }

    public function blockAab616a7ad3bc963c9c8af4edc817ba8($context)
    {
        $indent = $buffer = '';
        $buffer .= 'drawer drawer-right rui-right-drawer';
        $value = $context->find('blockdraweropen');
        $buffer .= $this->section1cb47d3ed9b97c6d6d496d2358bec253($context, $indent, $value);
    
        return $buffer;
    }

    public function block66d65e25fb753137130038e2eb5f751b($context)
    {
        $indent = $buffer = '';
        $buffer .= '    <section class="d-print-none" aria-label="';
        $value = $context->find('str');
        $buffer .= $this->sectionC14df02445cdd505a0208e8a56a5f32e($context, $indent, $value);
        $buffer .= '">
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('addblockbutton'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '        ';
        $value = $this->resolveValue($context->find('sidepreblocks'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    </section>
';
    
        return $buffer;
    }

    public function block59146569a56c3d2642fa2e8224817be0($context)
    {
        $indent = $buffer = '';
        $buffer .= $indent . 'drawer-open-block';
    
        return $buffer;
    }

    public function block13847ba3219919ecdb2378620735177c($context)
    {
        $indent = $buffer = '';
        $value = $context->find('forceblockdraweropen');
        $buffer .= $this->section1bd0cc4642e36d67e46c9dd550f1fa06($context, $indent, $value);
    
        return $buffer;
    }

    public function block0ea572ae0e89f9c5cc1dc5d7238a50d5($context)
    {
        $indent = $buffer = '';
        $buffer .= 'show-drawer-right';
    
        return $buffer;
    }

    public function blockC945de95615645c65d6b2f192042e6ea($context)
    {
        $indent = $buffer = '';
        $buffer .= 'left';
    
        return $buffer;
    }

    public function blockE052079a625ca42b568ba24af19cc7eb($context)
    {
        $indent = $buffer = '';
        $buffer .= '1';
    
        return $buffer;
    }

    public function blockC879444321d250421c3438099ae68173($context)
    {
        $indent = $buffer = '';
        $value = $context->find('str');
        $buffer .= $this->section31618380a8d2d407a8b2acf35dd449a4($context, $indent, $value);
    
        return $buffer;
    }
}
