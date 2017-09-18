This is a ViewHelper to extend TYPO3 table content element (CType="table") by colspan function.  

Example TYPO3 table content:

         Col1|Col2|Col3
         Content1|Content2|Content3
         Colspan2;;;2|Content3
      
Usage in Fluid:
 
     {namespace schmutt=Schmutt\Tablespan\ViewHelper}
     
     <table>
         <f:for each="{table}" as="row" iteration="rowIterator">
            <tr>
              <schmutt:tableColspan row="{row}" head="{rowIterator.isFirst}" />
            </tr>
         </f:for>
     </table>
     
For usage with Fluid Styled Content, you have to overwrite the Table.html in your template Extension. 
There is an example template included:  EXT:tablespan/FluidStyledContent/Table.html     