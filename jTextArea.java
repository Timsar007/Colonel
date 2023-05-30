import java.awt.*;
import javax.swing.*;

public class jTextArea extends JFrame {
    
   JTextArea txtArea = new JTextArea(5,18);
       
    public jTextArea() {
      
        txtArea.setText("Encode more text to see scrollbars");
        JScrollPane scrollingArea = new JScrollPane(txtArea);
        
        Font font = new Font("Arial", Font.ITALIC, 12);
        txtArea.setFont(font);
        txtArea.setForeground(Color.RED);
      
        
        JPanel content = new JPanel();
        content.setLayout(new BorderLayout());
        content.add(scrollingArea, BorderLayout.CENTER);
    
        this.setContentPane(content);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.pack();
    }
    
    public static void main(String[] args) {
        JFrame txtArea = new jTextArea();
        txtArea.setTitle("JTextArea Component");
        txtArea.setVisible(true);
        txtArea.setSize(250,140);
        txtArea.setLocation(300,300);
    }
}

