<?php

class __Mustache_45035a03e833154ee15bef50deb945a5 extends Mustache_Template
{
    private $lambdaHelper;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $value = $this->resolveValue($context->findDot('output.doctype'), $context);
        $buffer .= $indent . ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '<html ';
        $value = $this->resolveValue($context->findDot('output.htmlattributes'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= ' ';
        $value = $context->find('darkmodeon');
        $buffer .= $this->sectionA9a7e73ef034d13acceee012944fd632($context, $indent, $value);
        $buffer .= '>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '    <title>';
        $value = $this->resolveValue($context->findDot('output.page_title'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '</title>
';
        $buffer .= $indent . '    <meta property="og:title" content="';
        $value = $this->resolveValue($context->findDot('output.page_title'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" />
';
        $buffer .= $indent . '
';
        $value = $context->find('themeauthor');
        $buffer .= $this->section41fb24c958ef3c1d84750f52e5a3a825($context, $indent, $value);
        $buffer .= $indent . '
';
        $value = $context->find('seometadesc');
        $buffer .= $this->section53c581b5009cc3795dbddb692816ba98($context, $indent, $value);
        $buffer .= $indent . '    
';
        $buffer .= $indent . '    <meta name="theme-color" content="';
        $value = $this->resolveValue($context->find('seothemecolor'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $value = $context->find('seothemecolor');
        if (empty($value)) {
            
            $buffer .= '#fff';
        }
        $buffer .= '">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <link rel="shortcut icon" href="';
        $value = $this->resolveValue($context->findDot('output.favicon'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '" />
';
        $buffer .= $indent . '    ';
        $value = $context->find('seoappletouchicon');
        $buffer .= $this->section51d2aab02794407c1086dba01236c39c($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        $value = $context->find('favicon16');
        $buffer .= $this->section307c25849557db5f7dc73f449b733ea0($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        $value = $context->find('favicon32');
        $buffer .= $this->section04c85fcf73c1fa3fa9570bef27df8430($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '    ';
        $value = $context->find('faviconsafaritab');
        $buffer .= $this->sectionB024bd67f4d7799b9c146c4679524655($context, $indent, $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->findDot('output.standard_head_html'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '    <meta name="viewport" content="width=device-width, initial-scale=1.0">
';
        $buffer .= $indent . '
';
        $value = $context->find('fontfiles');
        if (empty($value)) {
            
            $value = $context->find('googlefonturl');
            $buffer .= $this->section927dda6b50ae9364ea2d40f00ce0d04d($context, $indent, $value);
        }
        $buffer .= $indent . '
';
        $value = $context->find('isfrontpage');
        $buffer .= $this->sectionDd4ff11cf5abe0e71d3634117cd2b11d($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '    ';
        $value = $this->resolveValue($context->find('additionalheadscripts'), $context);
        $buffer .= ($value === null ? '' : $value);
        $buffer .= '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</head>
';

        return $buffer;
    }

    private function sectionA9a7e73ef034d13acceee012944fd632(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = 'class="dark-mode"';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'class="dark-mode"';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section41fb24c958ef3c1d84750f52e5a3a825(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <!--

      Theme: alpha Moodle Theme
      Author: Marcin Czaja - Rosea Themes (rosea.io)
      Version: 2.5.15

      Copyright © 2022 - 2024

    -->
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <!--
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '      Theme: alpha Moodle Theme
';
                $buffer .= $indent . '      Author: Marcin Czaja - Rosea Themes (rosea.io)
';
                $buffer .= $indent . '      Version: 2.5.15
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '      Copyright © 2022 - 2024
';
                $buffer .= $indent . '
';
                $buffer .= $indent . '    -->
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section53c581b5009cc3795dbddb692816ba98(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <meta name="description" content="{{seometadesc}}">
    <meta property="og:description" content="{{seometadesc}}" />
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <meta name="description" content="';
                $value = $this->resolveValue($context->find('seometadesc'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">
';
                $buffer .= $indent . '    <meta property="og:description" content="';
                $value = $this->resolveValue($context->find('seometadesc'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" />
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section51d2aab02794407c1086dba01236c39c(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<link rel="apple-touch-icon" href="{{seoappletouchicon}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<link rel="apple-touch-icon" href="';
                $value = $this->resolveValue($context->find('seoappletouchicon'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section307c25849557db5f7dc73f449b733ea0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<link rel="icon" type"image/png" sizes="16x16" href="{{favicon16}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<link rel="icon" type"image/png" sizes="16x16" href="';
                $value = $this->resolveValue($context->find('favicon16'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section04c85fcf73c1fa3fa9570bef27df8430(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<link rel="icon" type"image/png" sizes="32x32" href="{{favicon32}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<link rel="icon" type"image/png" sizes="32x32" href="';
                $value = $this->resolveValue($context->find('favicon32'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB024bd67f4d7799b9c146c4679524655(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '<link rel="mask-icon" color="{{faviconsafaritabcolor}}" href="{{faviconsafaritab}}">';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= '<link rel="mask-icon" color="';
                $value = $this->resolveValue($context->find('faviconsafaritabcolor'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" href="';
                $value = $this->resolveValue($context->find('faviconsafaritab'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section927dda6b50ae9364ea2d40f00ce0d04d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{{googlefonturl}}}" rel="stylesheet">
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <link rel="preconnect" href="https://fonts.googleapis.com">
';
                $buffer .= $indent . '    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
';
                $buffer .= $indent . '    <link href="';
                $value = $this->resolveValue($context->find('googlefonturl'), $context);
                $buffer .= ($value === null ? '' : $value);
                $buffer .= '" rel="stylesheet">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDd4ff11cf5abe0e71d3634117cd2b11d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (!is_string($value) && is_callable($value)) {
            $source = '
    <!-- Swiper JS -->
    <script src="{{siteurl}}/theme/alpha/addons/swiper/swiper-bundle.min.js"></script>
    <script src="{{siteurl}}/theme/alpha/addons/tinyslider/tiny-slider.js"></script>
    <link rel="stylesheet" href="{{siteurl}}/theme/alpha/addons/tinyslider/tiny-slider.css">
    ';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            $buffer .= $result;
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '    <!-- Swiper JS -->
';
                $buffer .= $indent . '    <script src="';
                $value = $this->resolveValue($context->find('siteurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/alpha/addons/swiper/swiper-bundle.min.js"></script>
';
                $buffer .= $indent . '    <script src="';
                $value = $this->resolveValue($context->find('siteurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/alpha/addons/tinyslider/tiny-slider.js"></script>
';
                $buffer .= $indent . '    <link rel="stylesheet" href="';
                $value = $this->resolveValue($context->find('siteurl'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '/theme/alpha/addons/tinyslider/tiny-slider.css">
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
