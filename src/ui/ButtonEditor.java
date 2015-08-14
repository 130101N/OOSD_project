/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ui;

import java.awt.Component;
import javax.swing.DefaultCellEditor;
import javax.swing.JButton;
import javax.swing.JCheckBox;
import javax.swing.JTable;

/**
 *
 * @author Charuni
 */
class ButtonEditor extends DefaultCellEditor{

    private JButton button;
    private String label;

    public ButtonEditor(JButton button) {
        super(new JCheckBox());
        this.button = button;
    }

    @Override
    public Component getTableCellEditorComponent(JTable table, Object value, boolean isSelected, int row, int column) {
        if(value == null){
            label = "";
        }else{
            label = value.toString();
        }
        button.setText(label);
        return this.button;
    }

    @Override
    public Object getCellEditorValue() {
        return this.label;
    }
    
}
